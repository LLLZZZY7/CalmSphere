<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Therapist;

class TherapyController extends Controller
{
    public function index()
    {
        $therapists = Therapist::all();
        return view('therapy', compact('therapists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'therapist_id' => 'required|exists:therapists,id',
        ]);

        // Create a dummy appointment for demonstration
        \App\Models\Appointment::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'therapist_id' => $request->therapist_id,
            'appointment_time' => now()->addDays(rand(1, 7))->setHour(rand(9, 17))->setMinute(0),
            'status' => 'scheduled',
            'type' => 'video',
        ]);

        return redirect()->back()->with('success', 'Session booked successfully! Check your dashboard for details.');
    }
}
