<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\Service;
use App\Models\ServiceDetails;
use App\Models\Submenu;

class ServiceDetailsController extends Controller
{
    public function index()
    {
        $service_details = ServiceDetails::orderBy('created_at', 'desc')->get();;  
          $services = Services::all();
          
        return view('admin.service_details', compact('service_details', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id'       => 'required|exists:services,id',
            'image'            => 'nullable|image',
            'title'            => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $imagePath = null;

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/service_details/';
                $file = $request->file('image');
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path($uploadPath), $fileName);
                $imagePath = $uploadPath . $fileName;
            }

           
            $faqJson = $request->faq;

            $convertedFaq = collect(json_decode($faqJson, true))
                ->map(fn($item) => [
                    'title' => $item['title'],
                    'desc'  => $item['description'],
                ])
                ->toArray();

            // Create ServiceDetails entry
           $serviceDetail = ServiceDetails::create([
            'service_id'      =>  $request->service_id,
            'image'           =>  $imagePath,
            'title'           =>  $request->title,
            'full_desc'       =>  $request->full_desc,
            'short_desc'      =>  $request->short_desc,
            'book_contact_no' => $request->book_contact_no,
            'benifits' =>  $request->benifits,
            'faq'             => $convertedFaq,
        ]);
                

            DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Service detail added successfully.',
            'data' => $serviceDetail
        ]);
            // return redirect()->back()->with('success', 'Service detail added successfully.');

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to add service detail: ' . $e->getMessage());
        }
    }


    public function getPatientServices($id)
    {
        $patientServices = PatientServices::where('service_id', $id)->get();
        return response()->json($patientServices);
    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $service = Services::findOrFail($id);

    //         // 🔹 Store old link before updating
    //         $oldLink = $service->service_link;

    //         $request->validate([
    //             'service_name' => 'required|string|max:255',
    //             'service_image' => 'nullable|image',
    //         ]);

    //         // Generate new slug
    //         $slug = strtolower(trim($request->service_name));
    //         $slug = preg_replace('/[^a-z0-9 ]/', '', $slug);
    //         $slug = preg_replace('/\s+/', '_', $slug);
    //         $slug = preg_replace('/_+/', '_', $slug);

    //         $newLink = '/' . $slug;

    //         // Update service details
    //         $service->service_name = $request->service_name;
    //         $service->service_link = $newLink;

    //         // Handle image update
    //         if ($request->hasFile('service_image')) {
    //             if ($service->service_image) {
    //                 $oldImagePath = public_path($service->service_image);
    //                 if (file_exists($oldImagePath)) {
    //                     unlink($oldImagePath);
    //                 }
    //             }

    //             $uploadPath = 'uploads/services/';
    //             $fullPath = public_path($uploadPath);
    //             if (!file_exists($fullPath)) {
    //                 mkdir($fullPath, 0777, true);
    //             }

    //             $fileName = time() . '_' . uniqid() . '.' . $request->service_image->getClientOriginalExtension();

    //             if (!$request->service_image->move($fullPath, $fileName)) {
    //                 throw new \Exception('Failed to upload image');
    //             }

    //             $service->service_image = $uploadPath . $fileName;
    //         } elseif (!$request->has('keep_existing_image')) {
    //             if ($service->service_image) {
    //                 $oldImagePath = public_path($service->service_image);
    //                 if (file_exists($oldImagePath)) {
    //                     unlink($oldImagePath);
    //                 }
    //             }
    //             $service->service_image = null;
    //         }

    //         $service->save();

    //         $submenu = Submenu::where('submenu_link', $oldLink)
    //             ->orWhere('submenu_link', $service->service_link) // in case oldLink wasn't found
    //             ->first();

    //         if ($submenu) {
    //             $submenu->update([
    //                 'submenu_name' => $service->service_name,
    //                 'submenu_link' => $service->service_link,
    //                 'is_displayed' => 1,
    //             ]);
    //         } else {
    //             $nextSequence = (Submenu::max('submenu_sequence') ?? 0) + 1;

    //             Submenu::create([
    //                 'submenu_name'     => $service->service_name,
    //                 'submenu_sequence' => $nextSequence,
    //                 'submenu_link'     => $service->service_link,
    //                 'menu_id'          => 4,
    //                 'is_displayed'     => 1,
    //             ]);
    //         }

    //         // Handle patient_services_data if present
    //         if ($request->has('patient_services_data')) {
    //             $patientServicesData = json_decode($request->patient_services_data, true);

    //             if ($request->has('deleted_services')) {
    //                 $deletedServices = json_decode($request->deleted_services, true);
    //                 PatientServices::whereIn('id', $deletedServices)->delete();
    //             }

    //             foreach ($patientServicesData as $serviceData) {
    //                 if (isset($serviceData['id'])) {
    //                     PatientServices::where('id', $serviceData['id'])
    //                         ->update(['patient_service_name' => $serviceData['name']]);
    //                 } else {
    //                     PatientServices::create([
    //                         'service_id' => $service->id,
    //                         'patient_service_name' => $serviceData['name']
    //                     ]);
    //                 }
    //             }
    //         }

    //         DB::commit();

    //         return response()->json([
    //             'status' => 200,
    //             'success' => true,
    //             'message' => 'Service updated successfully',
    //             'service' => [
    //                 'id' => $service->id,
    //                 'service_name' => $service->service_name,
    //                 'service_image' => $service->service_image ? asset($service->service_image) : null,
    //                 'service_link' => $service->service_link,
    //                 'updated_at' => $service->updated_at->format('Y-m-d H:i:s')
    //             ]
    //         ]);
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return response()->json([
    //             'status' => 500,
    //             'success' => false,
    //             'message' => 'Error updating service: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

   public function update(Request $request, $id)
{
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'title' => 'required|string|max:255',
        'image' => 'nullable|image',
    ]);

    try {
        DB::beginTransaction();

        $service = ServiceDetails::findOrFail($id);

        // Handle image upload if new image is present
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/service_details/';
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadPath), $fileName);
            $imagePath = $uploadPath . $fileName;

            // Optionally delete old image here if needed
            // if (file_exists(public_path($service->image))) {
            //     unlink(public_path($service->image));
            // }

            $service->image = $imagePath;
        }

        // Convert FAQ JSON (just like in store method)
        $faqJson = $request->faq;
        $convertedFaq = collect(json_decode($faqJson, true))
            ->map(fn($item) => [
                'title' => $item['title'],
                'desc' => $item['description'],
            ])
            ->toArray();

        $service->service_id = $request->service_id;
        $service->title = $request->title;
        $service->full_desc = $request->full_desc;
        $service->short_desc = $request->short_desc;
        $service->book_contact_no = $request->book_contact_no;
        $service->faq = $convertedFaq;
        $service->benifits = $request->benifits;

        $service->save();

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully.',
            'data' => $service
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to update service: ' . $e->getMessage()
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

        $service_details = ServiceDetails::findOrFail($id);

        if ($service_details->image) {
            $imagePath = public_path($service_details->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $service_details->delete();

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Service details deleted successfully'
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