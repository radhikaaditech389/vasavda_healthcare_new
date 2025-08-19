<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sequence', 'asc')->get();
        $slider = new Slider();
        return view('admin.slider', compact('sliders', 'slider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpeg,jpg,png,mp4|max:20480',
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'title3' => 'required|string|max:255',
        ], [
            'media.required' => 'Media is required',
            'media.file' => 'Media must be a file',
            'media.mimes' => 'Media must be an image or video',
            'media.max' => 'Media size must not exceed 20MB',
            'title1.required' => 'Title 1 is required',
            'title2.required' => 'Title 2 is required',
            'title3.required' => 'Title 3 is required',
        ]);

        try {
            // Check dimensions for images only
            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $file = $request->file('media');

                // If the file is an image, validate dimensions
                $mimeType = $file->getMimeType();
                if (strstr($mimeType, 'image/')) {
                    list($width, $height) = getimagesize($file);

                    $maxWidth = 1920;
                    $maxHeight = 1080;

                    if ($width > $maxWidth || $height > $maxHeight) {
                        return response()->json([
                            'status' => 'error',
                            'errors' => [
                                'media' => "Image dimensions must not exceed {$maxWidth}x{$maxHeight} pixels."
                            ]
                        ], 422);
                    }
                }
            }

            $sequence = Slider::max('sequence') + 1;

            $slider = new Slider();
            $slider->sequence = $sequence; // Set the sequence here
            $slider->title1 = $request->title1;
            $slider->title2 = $request->title2;
            $slider->title3 = $request->title3;

            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $file = $request->file('media');

                // Validate image/video dimensions
                list($width, $height) = getimagesize($file);
                $maxWidth = 1920;
                $maxHeight = 1080;
                if ($width > $maxWidth || $height > $maxHeight) {
                    throw new \Exception("Media dimensions must not exceed the maximum size.");
                }

                // Create uploads directory if it doesn't exist
                $uploadPath = 'uploads/sliders/';
                $fullPath = public_path($uploadPath);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0777, true);
                }

                // Generate unique filename
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Get the MIME type before moving the file
                $mimeType = $file->getMimeType();

                // Move the file
                if ($file->move($fullPath, $fileName)) {
                    // Set the appropriate path based on file type
                    if (strstr($mimeType, 'image/')) {
                        $slider->image = $uploadPath . $fileName;
                        $slider->video = null;
                    } elseif (strstr($mimeType, 'video/')) {
                        $slider->video = $uploadPath . $fileName;
                        $slider->image = null;
                    }

                    $slider->save(); // Save the slider with the sequence

                    // Check if request wants JSON response
                    if ($request->expectsJson()) {
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Slider added successfully',
                            'slider' => [
                                'id' => $slider->id,
                                'sequence' => $sequence,
                                'image' => $slider->image ? asset($slider->image) : null,
                                'video' => $slider->video ? asset($slider->video) : null,
                                'created_at' => $slider->created_at->format('Y-m-d H:i:s')
                            ]
                        ]);
                    }

                    return back()->with('success', 'Slider added successfully');
                }
            }

            throw new \Exception('No valid file was uploaded.');
        } catch (\Exception $e) {
            if (isset($fileName) && file_exists($fullPath . $fileName)) {
                unlink($fullPath . $fileName);
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error adding slider: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error adding slider: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $slider = Slider::findOrFail($id);

            $request->validate([
                'title1' => 'required|string|max:255',
                'title2' => 'required|string|max:255',
                'title3' => 'required|string|max:255',
            ], [
                'title1.required' => 'Title 1 is required',
                'title2.required' => 'Title 2 is required',
                'title3.required' => 'Title 3 is required',
            ]);

            if ($request->hasFile('media')) {
                $file = $request->file('media');

                list($width, $height) = getimagesize($file);
                $maxWidth = 1920;
                $maxHeight = 1080;
                if ($width > $maxWidth || $height > $maxHeight) {
                    return response()->json([
                        'status' => 'error',
                        'errors' => [
                            'media' => "Media dimensions must not exceed the maximum size (1920 - 1080)."
                        ]
                    ], 422);
                }

                // Delete old files from public directory
                if ($slider->image) {
                    $oldImagePath = public_path($slider->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $slider->image = null;
                }
                if ($slider->video) {
                    $oldVideoPath = public_path($slider->video);
                    if (file_exists($oldVideoPath)) {
                        unlink($oldVideoPath);
                    }
                    $slider->video = null;
                }

                // Create uploads directory if it doesn't exist
                $uploadPath = 'uploads/sliders/';
                $fullPath = public_path($uploadPath);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0777, true);
                }

                // Generate unique filename
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Move the file
                if ($file->move($fullPath, $fileName)) {
                    // Set the appropriate path based on file type
                    $extension = strtolower($file->getClientOriginalExtension());
                    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                        $slider->image = $uploadPath . $fileName;
                        $slider->video = null;
                    } else {
                        $slider->video = $uploadPath . $fileName;
                        $slider->image = null;
                    }
                }
            }

            // Update sequence if provided
            if ($request->has('sequence')) {
                $slider->sequence = $request->sequence;
            }

            $slider->title1 = $request->title1;
            $slider->title2 = $request->title2;
            $slider->title3 = $request->title3;

            $slider->save();

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Slider updated successfully'
                ]);
            }
            return redirect()->route('admin.slider')->with('success', 'Slider updated successfully');
        } catch (\Exception $e) {
            if (isset($fileName) && file_exists($fullPath . $fileName)) {
                unlink($fullPath . $fileName);
            }

            return response()->json([
                'success' => false,
                'message' => 'Error updating slider: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail($id);

            // Delete the media file from public directory
            if ($slider->image) {
                $imagePath = public_path($slider->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            if ($slider->video) {
                $videoPath = public_path($slider->video);
                if (file_exists($videoPath)) {
                    unlink($videoPath);
                }
            }

            // Delete the database record
            $slider->delete();

            // Adjust the sequence numbers of the remaining sliders
            $sliders = Slider::orderBy('sequence', 'asc')->get();
            foreach ($sliders as $index => $slider) {
                $slider->update(['sequence' => $index + 1]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Slider deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting slider: ' . $e->getMessage()
            ], 500);
        }
    }
}
