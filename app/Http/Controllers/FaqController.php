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
                'answer'   => 'required|string',
            ]);

            $validatedData['show_on_home'] = $request->has('show_on_home') ? 1 : 0;

            $faq = Faq::create($validatedData);

            return response()->json([
                'status'  => 'success',
                'message' => 'Faq created successfully!',
                'data'    => $faq
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'question' => 'required|string|max:255',
                'answer'   => 'required|string',
            ]);

            $faq = Faq::findOrFail($id);

            $validatedData['show_on_home'] = $request->input('show_on_home') == 1 ? 1 : 0;

            $faq->update($validatedData);

            return response()->json([
                'status'  => 'success',
                'message' => 'Faq updated successfully!',
                'data'    => $faq
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
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
