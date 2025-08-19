<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Menu;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('sequence', 'asc')->get();
        $faqs = Faq::with('menu')->orderBy('id', 'asc')->get();
        return view("admin.add_faq", compact('menus', 'faqs'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'link' => 'nullable',
                'menu_id' => 'required|integer|exists:menus,id',
            ]);

            // Find the menu record by menu_id
            $menu = Menu::find($validatedData['menu_id']);

            if (!$menu) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Selected menu not found'
                ], 404);
            }

            // If link not provided or empty, assign link from menu_link
            if (empty($validatedData['link'])) {
                $validatedData['link'] = $menu->link; // use menu's existing link
            }

            $faq = Faq::create($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Faq created successfully!',
                'data' => $faq
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
        try {
            $validatedData = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'link' => 'nullable',
                'menu_id' => 'required|integer|exists:menus,id',
            ]);

            $faq = Faq::findOrFail($id);

            $oldMenuId = $faq->menu_id;
            $newMenuId = $validatedData['menu_id'];

            // Find the new menu
            $menu = Menu::find($newMenuId);

            if (!$menu) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Selected menu not found'
                ], 404);
            }

            // If menu_id changed, reset link to new menu's link
            if ($newMenuId != $oldMenuId) {
                $validatedData['link'] = $menu->link;
            } else {
                // menu_id same, if link empty, reset to menu link
                if (empty($validatedData['link'])) {
                    $validatedData['link'] = $menu->link;
                }
                // else keep the provided link as is
            }

            $faq->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Faq updated successfully!',
                'data' => $faq
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
            $faq = Faq::findOrFail($id);

            $faq->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Faq deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
