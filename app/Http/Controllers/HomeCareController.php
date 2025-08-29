<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeCarePageSettings;
use App\Models\HomeCareService;
use App\Models\Services;

class HomeCareController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $homeCare = HomeCarePageSettings::first();
        return view('admin.home_care_page', compact('homeCare', 'services'));
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

    // Home Care Services Management
    public function homeCareService()
    {
        $homeCareServices = HomeCareService::orderBy('display_order', 'asc')->get();
        return view("admin.home_care_services", compact("homeCareServices"));
    }

    public function storehomeCareDetails(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'purpose_html' => 'nullable|string',
            'services_html' => 'nullable|string',
            'benefits_html' => 'nullable|string',
            'considerations_html' => 'nullable|string',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_1.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/home_care_images/'), $fileName);
                $imagePath = 'uploads/home_care_images/' . $fileName;
            }

            $homeCareService = HomeCareService::create([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'image' => $imagePath,
                'display_order' => $request->display_order,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'purpose_html' => $request->purpose_html,
                'services_html' => $request->services_html,
                'benefits_html' => $request->benefits_html,
                'considerations_html' => $request->considerations_html,
            ]);

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Home Care Service added successfully',
                'data' => $homeCareService,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Failed to add Home Care Service: ' . $e->getMessage(),
            ]);
        }
    }

    public function updatehomeCareDetails(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'purpose_html' => 'nullable|string',
            'services_html' => 'nullable|string',
            'benefits_html' => 'nullable|string',
            'considerations_html' => 'nullable|string',
        ]);

        try {
            $homeCareService = HomeCareService::findOrFail($id);

            if ($request->hasFile('image')) {
                if (!empty($homeCareService->image) && file_exists(public_path($homeCareService->image))) {
                    unlink(public_path($homeCareService->image));
                }

                $file = $request->file('image');
                $fileName = time() . '_1.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/home_care_images/'), $fileName);
                $homeCareService->image = 'uploads/home_care_images/' . $fileName;
            }

            $homeCareService->title = $request->title;
            $homeCareService->slug = \Str::slug($request->title);
            $homeCareService->display_order = $request->display_order;
            $homeCareService->is_active = $request->has('is_active') ? 1 : 0;
            $homeCareService->purpose_html = $request->purpose_html;
            $homeCareService->services_html = $request->services_html;
            $homeCareService->benefits_html = $request->benefits_html;
            $homeCareService->considerations_html = $request->considerations_html;

            $homeCareService->save();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Home Care Service updated successfully',
                'data' => $homeCareService,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Failed to update Home Care Service: ' . $e->getMessage(),
            ]);
        }
    }

    public function destroyhomeCareDetails($id)
    {
        try {
            $homeCareService = HomeCareService::findOrFail($id);

            if (!empty($homeCareService->image) && file_exists(public_path($homeCareService->image))) {
                unlink(public_path($homeCareService->image));
            }

            $homeCareService->delete();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Home Care Service deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Failed to delete Home Care Service: ' . $e->getMessage(),
            ]);
        }
    }
}
