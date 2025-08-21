<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view("admin.add_doctors", compact("doctors"));
    }

    public function doctorDetails()
    {
        $doctors = Doctor::all();
        $doctorDetails = DoctorDetail::with('doctor')->get();
        return view("admin.add_doctor_details", compact("doctorDetails", "doctors"));
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

    public function storeDoctorDetails(Request $request)
    {
        $request->validate([
            'doctor_id'   => 'required|exists:doctors,id',
            'education'   => 'nullable|string|max:255',
            'languages'   => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'experience'  => 'nullable|string',
            'extra_info'  => 'nullable|string',
        ]);

        // Prevent duplicate doctor details
        if (DoctorDetail::where('doctor_id', $request->doctor_id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Details for this doctor already exist.'
            ]);
        }

        DoctorDetail::create([
            'doctor_id'   => $request->doctor_id,
            'education'   => $request->education,
            'languages'   => $request->languages,
            'description' => $request->description,
            'experience'  => $request->experience,
            'extra_info'  => $request->extra_info,
        ]);

        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Doctor details added successfully.'
        ]);
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

    public function updateDoctorDetails(Request $request, $id)
    {
        $request->validate([
            'doctor_id'   => 'required|exists:doctors,id',
            'education'   => 'nullable|string|max:255',
            'languages'   => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'experience'  => 'nullable|string',
            'extra_info'  => 'nullable|string',
        ]);

        // Find the doctor detail record
        $doctorDetail = DoctorDetail::find($id);

        if (!$doctorDetail) {
            return response()->json([
                'success' => false,
                'message' => 'Doctor details not found.'
            ]);
        }

        // Optional: prevent duplicate doctor_id (if changing doctor)
        if ($doctorDetail->doctor_id != $request->doctor_id) {
            if (DoctorDetail::where('doctor_id', $request->doctor_id)->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Details for this doctor already exist.'
                ]);
            }
        }

        // Update the record
        $doctorDetail->update([
            'doctor_id'   => $request->doctor_id,
            'education'   => $request->education,
            'languages'   => $request->languages,
            'description' => $request->description,
            'experience'  => $request->experience,
            'extra_info'  => $request->extra_info,
        ]);

        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Doctor details updated successfully.'
        ]);
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

    public function destroyDoctorDetails($id)
    {
        try {
            $doctorDetail = DoctorDetail::findOrFail($id);
            $doctorDetail->delete();

            return response()->json([
                'success' => true,
                'message' => 'Doctor details deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting doctor details: ' . $e->getMessage()
            ], 500);
        }
    }
}
