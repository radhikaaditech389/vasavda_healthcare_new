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

    public function allReviews(Request $request)
    {
        $query = Review::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // $reviews = $query->orderBy('created_at', 'desc')->get();
        $reviews = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.allReviews', compact('reviews'));
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

    public function updateShowOnHome(Request $request)
    {
        Review::query()->update(['show_on_home' => 0]);

        if ($request->has('show_on_home')) {
            $selectedIds = array_keys($request->show_on_home);
            Review::whereIn('id', $selectedIds)->update(['show_on_home' => 1]);
        }

        return back()->with('success', 'Reviews updated successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if ($review->image_path && file_exists(public_path($review->image_path))) {
            unlink(public_path($review->image_path));
        }

        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }

    public function search(Request $request)
    {
        $q = $request->get('q');

        $reviews = Review::when($q, function ($query) use ($q) {
            $query->where('name', 'like', "%$q%")
                ->orWhere('location', 'like', "%$q%")
                ->orWhere('message', 'like', "%$q%");
        })->get();

        return response()->json($reviews);
    }
}
