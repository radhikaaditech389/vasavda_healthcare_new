<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\AboutSection;

class AboutSectionController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        return view('admin.about_section', compact('about'));
    }

    public function update(Request $request)
    {
        try {
            $about = AboutSection::firstOrFail();

            $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'languages' => 'nullable|string',
                'extra' => 'nullable|string',
                'experience' => 'nullable|string',
                'video_url' => 'nullable|url',
                'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Update text fields
            $about->title = $request->title;
            $about->subtitle = $request->subtitle;
            $about->description = $request->description;
            $about->languages = $request->languages;
            $about->extra = $request->extra;
            $about->experience = $request->experience;
            $about->video_url = $request->video_url;

            // IMAGE 1
            if ($request->hasFile('image1')) {
                if (!empty($about->image1) && file_exists(public_path($about->image1))) {
                    unlink(public_path($about->image1));
                }

                $file = $request->file('image1');
                $fileName = time() . '_1.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_section_images/'), $fileName);

                $about->image1 = 'uploads/about_section_images/' . $fileName;
            }

            // IMAGE 2
            if ($request->hasFile('image2')) {
                if (!empty($about->image2) && file_exists(public_path($about->image2))) {
                    unlink(public_path($about->image2));
                }

                $file = $request->file('image2');
                $fileName = time() . '_2.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/about_section_images/'), $fileName);

                $about->image2 = 'uploads/about_section_images/' . $fileName;
            }

            $about->save();

            return redirect()->back()->with('success', 'About section updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
}
