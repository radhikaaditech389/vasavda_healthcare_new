<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();
        return view("admin.add_footer", compact('footers'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'logo_image' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'days' => 'required|string|max:255',
            'hospital_time' => 'required|string|max:255',
            'consulting_time' => 'required|string|max:255',
            'special_time' => 'required|string|max:255',
            'yt_link' => 'required|string|max:255',
            'insta_link' => 'required|string|max:255',
            'map_address' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Create uploads directory if it doesn't exist
            $uploadPath = 'uploads/footer/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            // Check if the image is uploaded
            $imagePath = null;
            if ($request->hasFile('logo_image')) {
                // If an image is uploaded, generate the unique filename and save the image
                $image = $request->file('logo_image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            // Create the footer record, storing the image path
            $footer = Footer::create([
                'logo_image' => $imagePath,
                'description' => $request->description,
                'address' => $request->address,
                'phone_no' => $request->phone_no,
                'email' => $request->email,
                'days' => $request->days,
                'hospital_time' => $request->hospital_time,
                'consulting_time' => $request->consulting_time,
                'special_time' => $request->special_time,
                'yt_link' => $request->yt_link,
                'insta_link' => $request->insta_link,
                'map_address' => $request->map_address,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Footer added successfully',
                'data' => $footer,
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
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'days' => 'required|string|max:255',
            'hospital_time' => 'required|string|max:255',
            'consulting_time' => 'required|string|max:255',
            'special_time' => 'required|string|max:255',
            'yt_link' => 'required|string|max:255',
            'insta_link' => 'required|string|max:255',
            'map_address' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $footer = Footer::findOrFail($id);

            $uploadPath = 'uploads/footer/';
            $fullPath = public_path($uploadPath);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $imagePath = $footer->logo_image;  
            if ($request->hasFile('logo_image')) {
                if ($footer->logo_image && file_exists(public_path($footer->logo_image))) {
                    unlink(public_path($footer->logo_image)); 
                }

                $image = $request->file('logo_image');
                $imagePath = $uploadPath . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($fullPath, $imagePath);
            }

            $footer->update([
                'logo_image' => $imagePath,
                'description' => $request->description,
                'address' => $request->address,
                'phone_no' => $request->phone_no,
                'email' => $request->email,
                'days' => $request->days,
                'hospital_time' => $request->hospital_time,
                'consulting_time' => $request->consulting_time,
                'special_time' => $request->special_time,
                'yt_link' => $request->yt_link,
                'insta_link' => $request->insta_link,
                'map_address' => $request->map_address,
            ]);

            DB::commit();

            return redirect()->route('admin.footer')
                ->with('success', 'Footer updated successfully');
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

            $footer = Footer::findOrFail($id);

            if ($footer->logo_image) {
                $imagePath = public_path($footer->logo_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $footer->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'footer data deleted successfully'
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
