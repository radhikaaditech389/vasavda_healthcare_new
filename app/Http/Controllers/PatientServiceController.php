<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\PatientServices;

class PatientServiceController extends Controller
{
    public function index()
    {
        $patient_services = PatientServices::all();
        $services = Services::all();
        return view('admin.add_services', compact('patient_services', 'services'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'service_name' => 'required|string|max:255',
                'service_image' => 'required|image',
            ]);

            $slug = strtolower(trim($request->service_name));
            $slug = preg_replace('/[^a-z0-9 ]/', '', $slug);
            $slug = preg_replace('/\s+/', '_', $slug);
            $slug = preg_replace('/_+/', '_', $slug);

            $baseUrl = "https://vasavadahospitals.org";
            $serviceLink = rtrim($baseUrl, '/') . '/' . $slug;

            $uploadPath = 'uploads/services/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $fileName = time() . '_' . uniqid() . '.' . $request->service_image->getClientOriginalExtension();

            $service = Services::create([
                'service_name' => $request->service_name,
                'service_image' => $uploadPath . $fileName,
                'service_link' => $serviceLink,
            ]);

            if (!$request->service_image->move($fullPath, $fileName)) {
                throw new \Exception('Failed to upload image');
            }

            // if ($request->has('patient_services')) {
            //     foreach ($request->patient_services as $patientService) {
            //         if (!empty($patientService)) {
            //             PatientServices::create([
            //                 'service_id' => $service->id,
            //                 'patient_service_name' => $patientService
            //             ]);
            //         }
            //     }
            // }

            DB::commit();

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Service added successfully',
                    'service' => [
                        'id' => $service->id,
                        'service_name' => $service->service_name,
                        'service_image' => asset($service->service_image),
                        'service_link' => $service->service_link,
                        'created_at' => $service->created_at->format('Y-m-d H:i:s')
                    ]
                ]);
            }

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Service created successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while saving the service: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getPatientServices($id)
    {
        $patientServices = PatientServices::where('service_id', $id)->get();
        return response()->json($patientServices);
    }

    public function update(Request $request, $id)
    {
        try {
            $service = Services::findOrFail($id);

            // Update basic service information
            $service->service_name = $request->service_name;
            $service->service_link = $request->service_link;

            // Handle image update
            if ($request->hasFile('service_image')) {
                // Delete old image if exists
                if ($service->service_image) {
                    $oldImagePath = public_path($service->service_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Store new image
                $uploadPath = 'uploads/services/';
                $fullPath = public_path($uploadPath);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0777, true);
                }

                // Generate unique filename
                $fileName = time() . '_' . uniqid() . '.' . $request->service_image->getClientOriginalExtension();

                // Move the image
                if (!$request->service_image->move($fullPath, $fileName)) {
                    throw new \Exception('Failed to upload image');
                }

                $service->service_image = $uploadPath . $fileName;
            } elseif (!$request->has('keep_existing_image')) {
                // Only remove image if explicitly requested
                if ($service->service_image) {
                    $oldImagePath = public_path($service->service_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $service->service_image = null;
            }

            $service->save();

            // Handle patient services
            if ($request->has('patient_services_data')) {
                $patientServicesData = json_decode($request->patient_services_data, true);

                // Handle deleted services
                if ($request->has('deleted_services')) {
                    $deletedServices = json_decode($request->deleted_services, true);
                    PatientServices::whereIn('id', $deletedServices)->delete();
                }

                // Update existing and add new patient services
                foreach ($patientServicesData as $serviceData) {
                    if (isset($serviceData['id'])) {
                        // Update existing service
                        PatientServices::where('id', $serviceData['id'])
                            ->update(['patient_service_name' => $serviceData['name']]);
                    } else {
                        // Add new service
                        PatientServices::create([
                            'service_id' => $service->id,
                            'patient_service_name' => $serviceData['name']
                        ]);
                    }
                }
            }

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Service updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error updating service: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deletePatientService($serviceId, $patientServiceId)
    {
        try {
            // Changed PatientService to PatientServices to match your model name
            $patientService = PatientServices::where('service_id', $serviceId)
                ->where('id', $patientServiceId)
                ->firstOrFail();

            $patientService->delete();

            return response()->json([
                'success' => true,
                'message' => 'Patient service deleted successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error deleting patient service: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete patient service: ' . $e->getMessage() // Added error message for debugging
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Find the service
            $service = Services::findOrFail($id);

            // Delete the image if it exists
            if ($service->service_image) {
                $imagePath = public_path($service->service_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete all related patient services
            PatientServices::where('service_id', $id)->delete();

            // Delete the service itself
            $service->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Service and related data deleted successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error deleting service: ' . $e->getMessage()
            ], 500);
        }
    }
}
