<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\PatientServices;
use App\Models\Submenu;

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

            // Generate slug
            $slug = strtolower(trim($request->service_name));
            $slug = preg_replace('/[^a-z0-9 ]/', '', $slug);
            $slug = preg_replace('/\s+/', '_', $slug);
            $slug = preg_replace('/_+/', '_', $slug);

            $serviceLink = '/' . $slug;

            // Upload image
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

            // Create submenu automatically
            $nextSequence = (Submenu::max('submenu_sequence') ?? 0) + 1;

            Submenu::create([
                'submenu_name'     => $service->service_name,
                'submenu_sequence' => $nextSequence,
                'submenu_link'     => $service->service_link,
                'menu_id'          => 4,
                'is_displayed'     => 1,
            ]);

            DB::commit();

            $service = Services::find($service->id);

            return response()->json([
                'status' => 'success',
                'message' => 'Service created successfully',
                'service' => [
                    'id' => $service->id,
                    'service_name' => $service->service_name,
                    'service_image' => asset($service->service_image),
                    'service_link' => $service->service_link,
                    'created_at' => $service->created_at->format('Y-m-d H:i:s')
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage()
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
            DB::beginTransaction();

            $service = Services::findOrFail($id);

            // Store old link before updating
            $oldLink = $service->service_link;

            $request->validate([
                'service_name' => 'required|string|max:255',
                'service_image' => 'nullable|image',
            ]);

            // Generate new slug
            $slug = strtolower(trim($request->service_name));
            $slug = preg_replace('/[^a-z0-9 ]/', '', $slug);
            $slug = preg_replace('/\s+/', '_', $slug);
            $slug = preg_replace('/_+/', '_', $slug);

            $newLink = '/' . $slug;

            // Update service details
            $service->service_name = $request->service_name;
            $service->service_link = $newLink;

            // Handle image update
            if ($request->hasFile('service_image')) {
                if ($service->service_image) {
                    $oldImagePath = public_path($service->service_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $uploadPath = 'uploads/services/';
                $fullPath = public_path($uploadPath);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0777, true);
                }

                $fileName = time() . '_' . uniqid() . '.' . $request->service_image->getClientOriginalExtension();

                if (!$request->service_image->move($fullPath, $fileName)) {
                    throw new \Exception('Failed to upload image');
                }

                $service->service_image = $uploadPath . $fileName;
            } elseif (!$request->has('keep_existing_image')) {
                if ($service->service_image) {
                    $oldImagePath = public_path($service->service_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $service->service_image = null;
            }

            $service->save();

            $submenu = Submenu::where('submenu_link', $oldLink)
                ->orWhere('submenu_link', $service->service_link) 
                ->first();

            if ($submenu) {
                $submenu->update([
                    'submenu_name' => $service->service_name,
                    'submenu_link' => $service->service_link,
                    'is_displayed' => 1,
                ]);
            } else {
                $nextSequence = (Submenu::max('submenu_sequence') ?? 0) + 1;

                Submenu::create([
                    'submenu_name'     => $service->service_name,
                    'submenu_sequence' => $nextSequence,
                    'submenu_link'     => $service->service_link,
                    'menu_id'          => 4,
                    'is_displayed'     => 1,
                ]);
            }

            // Handle patient_services_data if present
            if ($request->has('patient_services_data')) {
                $patientServicesData = json_decode($request->patient_services_data, true);

                if ($request->has('deleted_services')) {
                    $deletedServices = json_decode($request->deleted_services, true);
                    PatientServices::whereIn('id', $deletedServices)->delete();
                }

                foreach ($patientServicesData as $serviceData) {
                    if (isset($serviceData['id'])) {
                        PatientServices::where('id', $serviceData['id'])
                            ->update(['patient_service_name' => $serviceData['name']]);
                    } else {
                        PatientServices::create([
                            'service_id' => $service->id,
                            'patient_service_name' => $serviceData['name']
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Service updated successfully',
                'service' => [
                    'id' => $service->id,
                    'service_name' => $service->service_name,
                    'service_image' => $service->service_image ? asset($service->service_image) : null,
                    'service_link' => $service->service_link,
                    'updated_at' => $service->updated_at->format('Y-m-d H:i:s')
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollback();
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
            $patientService = PatientServices::where('service_id', $serviceId)
                ->where('id', $patientServiceId)
                ->firstOrFail();

            $patientService->delete();

            return response()->json([
                'success' => true,
                'message' => 'Patient service deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete patient service: ' . $e->getMessage() 
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $service = Services::findOrFail($id);

            if ($service->service_image) {
                $imagePath = public_path($service->service_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            PatientServices::where('service_id', $id)->delete();
            Submenu::where('submenu_link', $service->service_link)->delete();

            $service->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Service and related submenu deleted successfully'
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
