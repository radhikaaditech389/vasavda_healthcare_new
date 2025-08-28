<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string'
        ]);

        ContactMessage::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        $contacts = ContactMessage::orderBy('created_at', 'desc')->get();
        $contactCount = $contacts->count();
        return view('admin.contact_list', compact('contacts', 'contactCount'));
    }
}