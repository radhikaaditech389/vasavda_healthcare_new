<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $pendingReviews = Review::where('status', 'pending')->latest()->get();
        return view('admin.reviews', compact('pendingReviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3000',
        ]);

        $data = $request->all();
        $data['status'] = 'pending';
        $imagePath = null;

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/reviews/';
            $fullPath = public_path($uploadPath);

            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($fullPath, $imageName);

            $imagePath = $uploadPath . $imageName;
        }

        $data['image_path'] = $imagePath;

        Review::create($data);

        return back()->with('success', 'Your review has been submitted for approval!');
    }

    public function approve(Review $review)
    {
        $review->status = 'approved';
        $review->save();

        return back()->with('success', 'Review has been approved successfully!');
    }

    public function reject(Review $review)
    {
        $review->status = 'rejected';
        $review->save();

        return back()->with('success', 'Review has been rejected.');
    }
}
