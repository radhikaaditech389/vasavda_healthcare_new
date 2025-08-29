<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CancerCare;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CancerCareController extends Controller
{
    // Return view with DataTable setup
    public function index(Request $request)
    {
           $cancer_care_data = CancerCare::orderBy('created_at', 'desc')->get();
        return view('admin.cancer_care',compact("cancer_care_data"));
    }

    // Store new record
      // CancerCareController.php
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'book_contact_no' => 'nullable|string|max:20',
        'symptoms' => 'nullable|string',
        'diagnosis' => 'nullable|string',
        'risk_factor' => 'nullable|string',
        'treatment' => 'nullable|string',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $cancerCare = new CancerCare($request->except(['image1', 'image2'])); // Exclude files first

    // Handle Image 1
    if ($request->hasFile('image1')) {
        $file = $request->file('image1');
        $filename = time() . '_1_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = 'uploads/cancer_care/';
        $file->move(public_path($path), $filename);
        $cancerCare->image1 = $path . $filename;
    }

    // Handle Image 2
    if ($request->hasFile('image2')) {
        $file = $request->file('image2');
        $filename = time() . '_2_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = 'uploads/cancer_care/';
        $file->move(public_path($path), $filename);
        $cancerCare->image2 = $path . $filename;
    }

    $cancerCare->save();

    return response()->json([
        'message' => 'Cancer care data added successfully.',
        'data' => $cancerCare
    ]);
}



    public function show($id)
{
    $cancerCare = CancerCare::find($id);

    if (!$cancerCare) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    return response()->json([
        'message' => 'Data fetched successfully',
        'data' => $cancerCare
    ]);
}

    // Update cancer care
   public function update(Request $request, $id)
{
    $cancerCare = CancerCare::find($id);
    if (!$cancerCare) {
        return response()->json(['message' => 'Data not found.'], 404);
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'book_contact_no' => 'nullable|string|max:20',
        'symptoms' => 'nullable|string',
        'diagnosis' => 'nullable|string',
        'risk_factors' => 'nullable|string',
        'treatment' => 'nullable|string',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $cancerCare->fill($request->except(['image1', 'image2'])); // Don't fill file fields

    $uploadPath = 'uploads/cancer_care/';

    // ✅ Update image1 if present
    if ($request->hasFile('image1')) {
        $file1 = $request->file('image1');
        $filename1 = time() . '_1_' . uniqid() . '.' . $file1->getClientOriginalExtension();
        $file1->move(public_path($uploadPath), $filename1);
        $cancerCare->image1 = $uploadPath . $filename1;
    }

    // ✅ Update image2 if present
    if ($request->hasFile('image2')) {
        $file2 = $request->file('image2');
        $filename2 = time() . '_2_' . uniqid() . '.' . $file2->getClientOriginalExtension();
        $file2->move(public_path($uploadPath), $filename2);
        $cancerCare->image2 = $uploadPath . $filename2;
    }

    $cancerCare->save();

    return response()->json([
        'message' => 'Cancer care data updated successfully.',
        'data' => $cancerCare
    ]);
}


    // Delete a record
  public function destroy($id)
{
    try {
        DB::beginTransaction();

        $cancer_details = CancerCare::findOrFail($id);

        if ($cancer_details->image1) {
            $imagePath = public_path($cancer_details->image1);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
         if ($cancer_details->image2) {
            $imagePath = public_path($cancer_details->image2);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $cancer_details->delete();

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


    private function validateData(Request $request)
{
    return $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'book_contact_no' => 'nullable|string|max:10',
        'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'symptoms' => 'nullable|string',
        'diagnosis' => 'nullable|string',
        'risk_factors' => 'nullable|string',
        'treatment' => 'nullable|string',
    ]);
}
}