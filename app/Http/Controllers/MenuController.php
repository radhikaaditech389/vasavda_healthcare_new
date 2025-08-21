<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:20',
                'regex:/^[A-Za-z ]+$/'
            ],
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed :max characters',
            'name.regex' => 'Name must contain only alphabetic characters and spaces',
        ]);

        try {
            $sequence = Menu::max('sequence') + 1;

            // Replace spaces with underscores, keep it lowercase
            $slug = strtolower(str_replace(' ', '_', trim($request->name)));

            // Store relative path (just /slug)
            $link = '/' . $slug;

            $menu = Menu::create([
                'name' => $request->name,
                'sequence' => $sequence,
                'link' => $link,
                'is_displayed' => $request->has('is_displayed') ? 1 : 0
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Menu created successfully!',
                'data' => $menu
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $menus = Menu::orderBy('sequence', 'asc')->get();
        $menu = new Menu();
        return view('admin.add_menu', compact('menus', 'menu'));
    }

    public function createSubmenu()
    {
        $menus = Menu::orderBy('sequence', 'asc')->get();
        $submenus = Submenu::with('menu')->orderBy('submenu_sequence', 'asc')->get();
        $submenu = new Submenu();
        return view('admin.add_submenu', compact('menus', 'submenus', 'submenu'));
    }

    public function storeSubmenu(Request $request)
    {
        $request->validate([
            'submenu_name' => [
                'required',
                'max:50',
            ],
        ], [
            'submenu_name.required' => 'Name is required',
            'submenu_name.max' => 'Name must not exceed :max characters',
        ]);

        try {
            $sequence = Submenu::max('submenu_sequence') + 1;

            // Replace spaces with underscores, keep it lowercase
            $slug = strtolower(trim($request->submenu_name));

            // Remove all characters that are NOT letters, numbers, or spaces
            $slug = preg_replace('/[^a-z0-9 ]/', '', $slug);

            // Replace one or more spaces with a single underscore
            $slug = preg_replace('/\s+/', '_', $slug);

            // Remove multiple underscores (if any)
            $slug = preg_replace('/_+/', '_', $slug);

            // ✅ Store only relative link like "/cardiology"
            $link = '/' . $slug;

            $submenu = Submenu::create([
                'submenu_name' => $request->submenu_name,
                'submenu_sequence' => $sequence,
                'submenu_link' => $link,
                'menu_id' => $request->menu_id,
                'is_displayed' => $request->has('is_displayed') ? 1 : 0
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Submenu created successfully!',
                'data' => $submenu
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'max:20',
                'regex:/^[A-Za-z ]+$/'
            ],
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed :max characters',
            'name.regex' => 'Name must contain only alphabetic characters and spaces',
        ]);

        try {
            $menu = Menu::findOrFail($id);

            $sequence = $request->sequence ?? $menu->sequence;

            // ✅ Just slug as relative path
            $slug = strtolower(str_replace(' ', '_', trim($request->name)));
            $link = '/' . $slug;

            $menu->update([
                'name' => $request->name,
                'sequence' => $sequence,
                'link' => $link,
                'is_displayed' => $request->has('is_displayed') ? 1 : 0
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Menu updated successfully!',
                'data' => $menu
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateSubmenu(Request $request, $id)
    {
        $request->validate([
            'submenu_name' => 'required|string|max:50',
        ], [
            'submenu_name.required' => 'Submenu Name is required',
            'submenu_name.string' => 'Submenu Name must be a string',
            'submenu_name.max' => 'Submenu Name must not exceed 50 characters',
        ]);

        try {
            $submenu = Submenu::findOrFail($id);

            $sequence = $request->sequence ?? $submenu->submenu_sequence;

            // ✅ Generate slug same as in store
            $slug = strtolower(trim($request->submenu_name));
            $slug = preg_replace('/[^a-z0-9 ]/', '', $slug);   // remove invalid chars
            $slug = preg_replace('/\s+/', '_', $slug);         // spaces → underscore
            $slug = preg_replace('/_+/', '_', $slug);          // collapse multiple underscores

            // ✅ Store only relative path like "/cardiology"
            $link = '/' . $slug;

            $submenu->update([
                'menu_id' => $request->menu_id,
                'submenu_name' => $request->submenu_name,
                'submenu_sequence' => $sequence,
                'submenu_link' => $link,
                'is_displayed' => $request->has('is_displayed') ? 1 : 0
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Submenu updated successfully!',
                'data' => $submenu
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);

            // Delete all submenus associated with this menu
            Submenu::where('menu_id', $id)->delete();

            $menu->delete();

            // Adjust the sequence numbers of the remaining menus
            $menus = Menu::orderBy('sequence', 'asc')->get();
            foreach ($menus as $index => $menu) {
                $menu->update(['sequence' => $index + 1]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Menu deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroySubmenu($id)
    {
        try {
            $submenu = Submenu::findOrFail($id);

            $submenu->delete();

            // Adjust the sequence numbers of the remaining submenus
            $submenus = Submenu::orderBy('submenu_sequence', 'asc')->get();
            foreach ($submenus as $index => $submenu) {
                $submenu->update(['submenu_sequence' => $index + 1]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Submenu deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateSequence(Request $request)
    {
        foreach ($request->sequence as $id => $position) {
            \App\Models\Menu::where('id', $id)->update(['sequence' => $position]);
        }
        return response()->json(['message' => 'Sequence updated successfully!']);
    }
}
