<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view("admin.add_doctors", compact("doctors"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'doctor_image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        try {
            DB::beginTransaction();

            $uploadPath = 'uploads/doctors/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = null;
            if ($request->hasFile('doctor_image')) {
                $image = $request->file('doctor_image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $doctor = Doctor::create([
                'name' => $request->name,
                'specialization' => $request->specialization,
                'image' => $imagePath,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Doctor added successfully',
                'data' => $doctor,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        try {
            DB::beginTransaction();

            $doctor = Doctor::findOrFail($id);

            $uploadPath = 'uploads/doctors/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = $doctor->image;
            if ($request->hasFile('doctor_image')) {
                if ($doctor->image && file_exists(public_path($doctor->image))) {
                    unlink(public_path($doctor->image)); // Delete old image
                }

                $image = $request->file('doctor_image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $doctor->update([
                'name' => $request->name,
                'specialization' => $request->specialization,
                'image' => $imagePath,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Doctor updated successfully',
                'data' => $doctor,
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

            $doctor = Doctor::findOrFail($id);

            if ($doctor->image) {
                $imagePath = public_path($doctor->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $doctor->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Doctor data deleted successfully'
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
