<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\PatientServices;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::orderBy('created_at', 'desc')->get();
        return view('admin.add_director', compact('directors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'image' => 'required|image',
        ]);

        try {
            DB::beginTransaction();

            $uploadPath = 'uploads/directors/';
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

            $director = Director::create([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,                
                'image' =>$imagePath ,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Director added successfully',
                'data' => $director,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
      public function getDirectorServices($id)
    {
        $patientServices = Director::where('id', $id)->get();
        return response()->json($patientServices);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
        ]);

        try {
            DB::beginTransaction();

            $director = Director::findOrFail($id);

            $uploadPath = 'uploads/directors/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = $director->image;
            if ($request->hasFile('image')) {
                if ($director->image && file_exists(public_path($director->image))) {
                    unlink(public_path($director->image)); // Delete old image
                }

                $image = $request->file('image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $director->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'image' => $imagePath,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Director updated successfully',
                'data' => $director,
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

            $director = Director::findOrFail($id);

            if ($director->image) {
                $imagePath = public_path($director->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $director->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Director data deleted successfully'
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
