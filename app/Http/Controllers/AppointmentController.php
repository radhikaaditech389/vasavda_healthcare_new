<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'area' => 'required',
            'appointment_date' => 'required',
            'message' => 'nullable'
        ]);

        $appointment = Appointment::create($validated);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }

    public function index()
    {
        $appointments = Appointment::orderBy('created_at', 'desc')->get();
        $appointmentCount = $appointments->count();
        return view('admin.patient_list', compact('appointments', 'appointmentCount'));
    }
}
