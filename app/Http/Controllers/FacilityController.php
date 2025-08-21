<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\PatientServices;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facility', compact('facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        try {
            DB::beginTransaction();

            $uploadPath = 'uploads/facilities/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $facility = Facility::create([
                'title' => $request->title,
                'description' => $request->description,    
                'image' =>$imagePath ,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Facility added successfully',
                'data' => $facility,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
      public function getFacilities($id)
    {
        $facilities = Facility::where('id', $id)->get();
        return response()->json($facilities);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
        ]);

        try {
            DB::beginTransaction();

            $facility = Facility::findOrFail($id);

            $uploadPath = 'uploads/facilities/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = $facility->image;
            if ($request->hasFile('image')) {
                if ($facility->image && file_exists(public_path($facility->image))) {
                    unlink(public_path($facility->image)); // Delete old image
                }

                $image = $request->file('image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $facility->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'facilities updated successfully',
                'data' => $facility,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $facility = Facility::findOrFail($id);

            if ($facility->image) {
                $imagePath = public_path($facility->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $facility->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Facility data deleted successfully'
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