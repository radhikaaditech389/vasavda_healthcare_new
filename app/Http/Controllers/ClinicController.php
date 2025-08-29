<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();
        return view('admin.clinic', compact('clinics'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'clinic_image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        try {
            DB::beginTransaction();

            $uploadPath = 'uploads/clinics/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = null;
            if ($request->hasFile('clinic_image')) {
                $image = $request->file('clinic_image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $clinic = Clinic::create([
                'title'            => $request->title,
                'slug'             => Str::slug($request->title),
                'image'            => $imagePath,
                'appointment_link' => '/appointment',

            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Clinic added successfully',
                'data' => $clinic,
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
            'title' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $clinic = Clinic::findOrFail($id);

            $uploadPath = 'uploads/clinics/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = $clinic->image;
            if ($request->hasFile('clinic_image')) {
                if ($clinic->image && file_exists(public_path($clinic->image))) {
                    unlink(public_path($clinic->image)); // Delete old image
                }

                $image = $request->file('clinic_image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $clinic->update([
                'title'            => $request->title,
                'slug'             => Str::slug($request->title),
                'image'            => $imagePath,
                'appointment_link' => '/appointment',
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Clinic updated successfully',
                'data' => $clinic,
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

            $clinic = Clinic::findOrFail($id);

            if ($clinic->image) {
                $imagePath = public_path($clinic->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $clinic->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Clinic deleted successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error deleting clinic: ' . $e->getMessage()
            ], 500);
        }
    }
}
