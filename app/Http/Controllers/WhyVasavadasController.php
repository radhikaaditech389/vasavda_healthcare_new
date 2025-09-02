<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class WhyVasavadasController extends Controller
{
    public function index()
    {
        $sections = Section::withCount('items')->get();
        return view('admin.why_vasavada', ['section' => null, 'sections' => $sections]);
    }

    public function edit($id)
    {
        $section = Section::with('items')->findOrFail($id);
        return view('admin.why_vasavada', compact('section'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'items.*.icon'  => 'nullable|file|mimes:svg|mimetypes:image/svg+xml|max:2048',
            'items.*.title' => 'required|string|max:255',
            'items.*.order' => 'nullable|integer',
        ]);

        $section = new Section();
        $section->name = $validated['name'];
        $section->title = $validated['title'] ?? null;
        $section->subtitle = $validated['subtitle'] ?? null;
        $section->description = $validated['description'] ?? null;
        if ($request->hasFile('image')) {
            $uploadDir = public_path('uploads/why_vasavada');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $section->image = 'uploads/why_vasavada/' . $fileName;
        }
        $section->save();

        $items = $request->input('items', []);
        if (!empty($items)) {
            $iconDir = public_path('uploads/why_vasavada/icons');
            if (!file_exists($iconDir)) {
                mkdir($iconDir, 0755, true);
            }
            foreach ($items as $index => $item) {
                $iconPath = null;
                $iconFile = $request->file("items.$index.icon");
                if ($iconFile) {
                    $fileName = time() . '_' . uniqid() . '.svg';
                    $iconFile->move($iconDir, $fileName);
                    $iconPath = 'uploads/why_vasavada/icons/' . $fileName;
                }
                $section->items()->create([
                    'icon' => $iconPath,
                    'title' => $item['title'] ?? '',
                    'order' => $item['order'] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.why_vasavada')->with('success', 'Section Created Successfully.');
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'title'         => 'nullable|string|max:255',
                'subtitle'      => 'nullable|string|max:255',
                'description'   => 'nullable|string',
                'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'items.*.icon'  => 'nullable|file|mimes:svg|mimetypes:image/svg+xml|max:2048',
                'items.*.title' => 'required|string|max:255',
                'items.*.order' => 'nullable|integer',
            ]);

            $section = Section::findOrFail($id);
            $section->title = $validated['title'] ?? null;
            $section->subtitle = $validated['subtitle'] ?? null;
            $section->description = $validated['description'] ?? null;

            if ($request->hasFile('image')) {
                if (!empty($section->image) && file_exists(public_path($section->image))) {
                    @unlink(public_path($section->image));
                }
                $uploadDir = public_path('uploads/why_vasavada');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $fileName);
                $section->image = 'uploads/why_vasavada/' . $fileName;
            }
            $section->save();

            $items = $request->input('items', []);
            $incomingIds = collect($items)->pluck('id')->filter()->all();
            if (!empty($incomingIds)) {
                $toDelete = $section->items()->whereNotIn('id', $incomingIds)->get();
                foreach ($toDelete as $delItem) {
                    if (!empty($delItem->icon) && file_exists(public_path($delItem->icon))) {
                        @unlink(public_path($delItem->icon));
                    }
                    $delItem->delete();
                }
            } else {
                foreach ($section->items as $delItem) {
                    if (!empty($delItem->icon) && file_exists(public_path($delItem->icon))) {
                        @unlink(public_path($delItem->icon));
                    }
                }
                $section->items()->delete();
            }

            foreach ($items as $index => $item) {
                $iconDir = public_path('uploads/why_vasavada/icons');
                if (!file_exists($iconDir)) {
                    mkdir($iconDir, 0755, true);
                }

                $iconPath = $item['existing_icon'] ?? null;
                $iconFile = $request->file("items.$index.icon");
                if ($iconFile) {
                    if (!empty($iconPath) && file_exists(public_path($iconPath))) {
                        @unlink(public_path($iconPath));
                    }
                    $fileName = time() . '_' . uniqid() . '.svg';
                    $iconFile->move($iconDir, $fileName);
                    $iconPath = 'uploads/why_vasavada/icons/' . $fileName;
                }

                $payload = [
                    'icon' => $iconPath,
                    'title' => $item['title'] ?? '',
                    'order' => $item['order'] ?? null,
                ];

                if (!empty($item['id'])) {
                    $section->items()->where('id', $item['id'])->update($payload);
                } else {
                    $section->items()->create($payload);
                }
            }

            return redirect()->route('admin.why_vasavada')->with('success', 'Section Updated Successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getLine());
            return redirect()->route('admin.why_vasavada')->with('error', 'Failed to update section. An unexpected error occurred.');
        }
    }

    public function destroy($id)
    {
        $section = Section::with('items')->findOrFail($id);
        if (!empty($section->image) && file_exists(public_path($section->image))) {
            @unlink(public_path($section->image));
        }
        $section->items()->delete();
        $section->delete();

        return redirect()->route('admin.why_vasavada')->with('success', 'Section Deleted Successfully.');
    }
}
