<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\DirectorDetails;
use App\Models\Sonography;
use Illuminate\Support\Facades\DB;

class SonographyController extends Controller
{
    public function index()
    {
        $sonography_data = Sonography::first();
        return view('admin.3d_4d_sonography', compact('sonography_data'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'name'              => 'required|string|max:255',
        'qualification'     => 'nullable|string|max:255',
        'specialization'    => 'nullable|string|max:255',
        'skills'            => 'nullable|string',
        'media_presence'    => 'nullable|string',
        'community_charity_work' => 'nullable|string',
        'languages'         => 'nullable|string|max:255',
        'bio'               => 'nullable|string',

        // images
        'image'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'campaign_image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'training_image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'award_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'charity_image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'membership_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        // arrays
        'campaigns'         => 'nullable|array',
        'trainings'         => 'nullable|array',
        'conferences'       => 'nullable|array',
        'awards'            => 'nullable|array',
        'memberships'       => 'nullable|array',
        'publications_talks'=> 'nullable|array',
    ]);

    try {
        DB::beginTransaction();

        $director = DirectorDetails::findOrFail($id);

        // ✅ Handle Multiple Images
        $uploadPath = 'uploads/directors/';
        $fullPath   = public_path($uploadPath);

        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0777, true);
        }

        // function for reusability
        $handleImageUpload = function ($fieldName, $oldPath = null) use ($request, $uploadPath, $fullPath) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $newPath = $uploadPath . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($fullPath, $newPath);

                // delete old image if exists
                if ($oldPath && file_exists(public_path($oldPath))) {
                    unlink(public_path($oldPath));
                }
                return $newPath;
            }
            return $oldPath;
        };

        // ✅ Process each image
        $image             = $handleImageUpload('image', $director->image);
        $campaignImage     = $handleImageUpload('campaign_image', $director->campaign_image);
        $trainingImage     = $handleImageUpload('training_image', $director->training_image);
        $awardImage        = $handleImageUpload('award_image', $director->award_image);
        $charityImage      = $handleImageUpload('charity_image', $director->charity_image);
        $membershipImage   = $handleImageUpload('membership_image', $director->membership_image);

        // ✅ Update Director
        $director->update([
            'name'              => $request->name,
            'qualification'     => $request->qualification,
            'specialization'    => $request->specialization,
            'skills'            => $request->skills,
            'languages'         => $request->languages,
            'bio'               => $request->bio,
            'media_presence'    => $request->media_presence,
            'community_charity_work' => $request->community_charity_work,

            'image'             => $image,
            'campaign_image'    => $campaignImage,
            'training_image'    => $trainingImage,
            'award_image'       => $awardImage,
            'charity_image'     => $charityImage,
            'membership_image'  => $membershipImage,

            // JSON fields
            'campaigns'         => $request->campaigns ? json_encode($request->campaigns) : null,
            'trainings'         => $request->trainings ? json_encode($request->trainings) : null,
            'conferences'       => $request->conferences ? json_encode($request->conferences) : null,
            'awards'            => $request->awards ? json_encode($request->awards) : null,
            'memberships'       => $request->memberships ? json_encode($request->memberships) : null,
            'publications_talks'=> $request->publications_talks ? json_encode($request->publications_talks) : null,
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Director updated successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


}