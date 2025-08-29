<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\DirectorDetails;
use App\Models\Sonography;
use App\Models\CancerCare;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CancerCareController extends Controller
{
    public function index()
    {
        $cancer_care_data = CancerCare::first();
        return view('admin.cancer_care', compact('cancer_care_data'));
    }

 public function update(Request $request, $id)
{
    $cancer_care_data = CancerCare::findOrFail($id);

    // 1. Validate inputs
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'sonography_image1' => 'nullable|image',
        'sonography_image2' => 'nullable|image',
        'sonography_image3' => 'nullable|image',
    ]);

    // 2. Update basic fields
    $sonography->title = $request->input('title');
     $sonography->book_contact_no = $request->input('book_contact_no');
    $sonography->description = $request->input('description');

    // 3. JSON fields
    $sonography->sonography_detail = json_encode($request->input('sonography'));
    $sonography->benifits = json_encode($request->input('benifits'));

    // Ensure the upload folder exists
    $uploadPath = public_path('uploads/sonography');
    if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0755, true);
    }

    // 4. Handle image uploads (all saved in public/uploads/sonography)
    if ($request->hasFile('image')) {
        if (File::exists(public_path($sonography->image))) {
            File::delete(public_path($sonography->image));
        }
        $file = $request->file('image');
        $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        $sonography->image = 'uploads/sonography/' . $filename;
    }

    if ($request->hasFile('sonography_image1')) {
        if (File::exists(public_path($sonography->sonography_image1))) {
            File::delete(public_path($sonography->sonography_image1));
        }
        $file = $request->file('sonography_image1');
        $filename = 'img1_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        $sonography->sonography_image1 = 'uploads/sonography/' . $filename;
    }

    if ($request->hasFile('sonography_image2')) {
        if (File::exists(public_path($sonography->sonography_image2))) {
            File::delete(public_path($sonography->sonography_image2));
        }
        $file = $request->file('sonography_image2');
        $filename = 'img2_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        $sonography->sonography_image2 = 'uploads/sonography/' . $filename;
    }

    if ($request->hasFile('sonography_image3')) {
        if (File::exists(public_path($sonography->sonography_image3))) {
            File::delete(public_path($sonography->sonography_image3));
        }
        $file = $request->file('sonography_image3');
        $filename = 'img3_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        $sonography->sonography_image3 = 'uploads/sonography/' . $filename;
    }

    // 5. Save the model
    $sonography->save();

    return redirect()->back()->with('success', 'Sonography updated successfully!');
}


}