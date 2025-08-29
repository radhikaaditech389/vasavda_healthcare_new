<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeCarePageSettings;

class HomeCareController extends Controller
{
    public function index()
    {
        $homeCare = HomeCarePageSettings::first();
        return view('admin.home_care_page', compact('homeCare'));
    }

    public function update(Request $request)
    {
        try {
            $homeCare = HomeCarePageSettings::firstOrFail();

            $request->validate([
                'page_title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'conclusion_html' => 'nullable|string',
                'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Update text fields
            $homeCare->page_title = $request->page_title;
            $homeCare->meta_title = $request->meta_title;
            $homeCare->meta_description = $request->meta_description;
            $homeCare->meta_keywords = $request->meta_keywords;
            $homeCare->conclusion_html = $request->conclusion_html;

            // Banner Image
            if ($request->hasFile('banner_image')) {
                if (!empty($homeCare->banner_image) && file_exists(public_path($homeCare->banner_image))) {
                    unlink(public_path($homeCare->banner_image));
                }

                $file = $request->file('banner_image');
                $fileName = time() . '_1.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/home_care_images/'), $fileName);

                $homeCare->banner_image = 'uploads/home_care_images/' . $fileName;
            }

            $homeCare->save();

            return redirect()->back()->with('success', 'Home Care Page updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
}
