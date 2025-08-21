<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        return view('admin.about_us', compact('about'));
    }

    public function update(Request $request)
    {
        try {
            $about = AboutUs::firstOrFail();

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'sub_title' => 'required|string|max:255',
                'sub_description' => 'nullable|string',
            ]);

            // Update text fields
            $about->title = $request->title;
            $about->description = $request->description;
            $about->sub_title = $request->sub_title;
            $about->sub_description = $request->sub_description;

            // IMAGE 1
            if ($request->hasFile(key: 'image')) {
                if (!empty($about->image) && file_exists(public_path($about->image))) {
                    unlink(public_path($about->image));
                }

                $file = $request->file('image');
                $fileName = time() . '_1.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_us_images/'), $fileName);

                $about->image = 'uploads/about_us_images/' . $fileName;
            }
            $about->save();

            return redirect()->back()->with('success', 'About us updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
}
