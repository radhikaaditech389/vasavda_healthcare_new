<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminLogin;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = AdminLogin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store user in session and redirect to admin panel
            session(['admin' => $admin->username]);
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['Invalid username or password']);
    }

    public function index()
    {
        // Check if the user is logged in
        if (session()->has('admin')) {
            return view('admin.index');
        }

         return redirect()->route('admin.login')->withErrors(['You must log in first']);
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $appointmentCount = Appointment::count();
        $contactCount = ContactMessage::count();

        return view('admin.index', compact('appointmentCount', 'contactCount'));
    }
}
