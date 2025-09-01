<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OncoGynecology;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OncoGynecologyController extends Controller
{
    // Return view with DataTable setup
    public function index(Request $request)
    {
           $onco_gynec_data = OncoGynecology::orderBy('created_at', 'desc')->get();
        return view('admin.onco_gynecology',compact("onco_gynec_data"));
    }

    // Store new record
      // CancerCareController.php
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string'
    ]);

    $oncoGynecology = new OncoGynecology($request->except(['image', 'image1'])); // Exclude files first

    // Handle Image 1
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_1_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = 'uploads/onco_gynecology/';
        $file->move(public_path($path), $filename);
        $oncoGynecology->image = $path . $filename;
    }

    // Handle Image 2
    if ($request->hasFile('image1')) {
        $file = $request->file('image1');
        $filename = time() . '_2_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = 'uploads/onco_gynecology/';
        $file->move(public_path($path), $filename);
        $oncoGynecology->image1 = $path . $filename;
    }

    $oncoGynecology->save();

    return response()->json([
        'message' => 'onco gynecology data added successfully.',
        'data' => $oncoGynecology
    ]);
}



    public function show($id)
{
    $OncoGynecology = OncoGynecology::find($id);

    if (!$OncoGynecology) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    return response()->json([
        'message' => 'Data fetched successfully',
        'data' => $OncoGynecology
    ]);
}

    // Update cancer care
   public function update(Request $request, $id)
{
    $OncoGynecology = OncoGynecology::find($id);
    if (!$OncoGynecology) {
        return response()->json(['message' => 'Data not found.'], 404);
    }

    $request->validate([
         'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $OncoGynecology->fill($request->except(['image', 'image1'])); // Don't fill file fields

    $uploadPath = 'uploads/onco_gynecology/';
    
    // ✅ Update image if present
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_2_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($uploadPath), $filename);
        $OncoGynecology->image = $uploadPath . $filename;
    }
    // ✅ Update image1 if present
    if ($request->hasFile('image1')) {
        $file1 = $request->file('image1');
        $filename1 = time() . '_1_' . uniqid() . '.' . $file1->getClientOriginalExtension();
        $file1->move(public_path($uploadPath), $filename1);
        $OncoGynecology->image1 = $uploadPath . $filename1;
    }


    $OncoGynecology->save();

    return response()->json([
        'message' => 'Onco Gynecology data updated successfully.',
        'data' => $OncoGynecology
    ]);
}


    // Delete a record
  public function destroy($id)
{
    try {
        DB::beginTransaction();

        $gynec_data = OncoGynecology::findOrFail($id);

        if ($gynec_data->image) {
           $imagePath = public_path($gynec_data->image);
           if (file_exists($imagePath)) {
               unlink($imagePath);
           }
       }
        if ($gynec_data->image1) {
            $imagePath = public_path($gynec_data->image1);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $gynec_data->delete();

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Gynec details deleted successfully'
        ]);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
            'success' => false,
            'message' => 'Error deleting Gynec: ' . $e->getMessage()
        ], 500);
    }
}
    
}