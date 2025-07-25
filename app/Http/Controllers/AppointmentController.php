<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Veterinarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::where('veterinarian_id', Auth::id())
            ->whereIn('status', ['pending', 'confirmed']) // Only relevant ones
            ->orderBy('appointment_date')
            ->get();

        return view('VETERINARIAN.dashboard', compact('appointments'));
    }

    public function updateStatus(Appointment $appointment, Request $request)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled',
        ]);

        if ($appointment->veterinarian_id !== Auth::id()) {
            abort(403);
        }

        if ($appointment->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending appointments can be updated.');
        }

        $appointment->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Appointment status updated.');
    }

    /**
     * Show the form for creating a new appointment for clients
     */
    public function create()
    {
        $veterinarians = Veterinarian::all();
        
        if (Auth::guard('client')->check()) {
            return view('CLIENT.appointments.create', compact('veterinarians'));
        } else {
            return view('appointment', compact('veterinarians'));
        }
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'concern_notes' => 'nullable|string',
            'dog_type' => 'nullable|string|max:255',
            'dog_age' => 'nullable|integer',
            'veterinarian_id' => 'required|exists:veterinarians,id',
        ]);

        // Create the appointment
        Appointment::create([
            'client_id' => Auth::guard('client')->id(),
            'veterinarian_id' => $request->veterinarian_id,
            'pet_name' => $request->pet_name,
            'owner_name' => $request->owner_name,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'concern_notes' => $request->concern_notes,
            'dog_type' => $request->dog_type,
            'dog_age' => $request->dog_age,
            'status' => 'pending',
        ]);

        if (Auth::guard('client')->check()) {
            return redirect()->route('client.appointments.index')
                ->with('success', 'Appointment successfully reserved.');
        } else {
            return redirect()->route('home')
                ->with('success', 'Appointment successfully reserved.');
        }
    }


    // Display the specified appointment
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    // Show the form for editing the specified appointment
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    // Update the specified appointment in storage
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'concern_notes' => 'nullable|string',
        ]);

        $appointment->update([
            'pet_name' => $request->pet_name,
            'owner_name' => $request->owner_name,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'concern_notes' => $request->concern_notes,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    // Remove the specified appointment from storage
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    /**
     * Display a listing of the client's appointments.
     */
    public function clientAppointments()
    {
        $appointments = Appointment::where('client_id', Auth::guard('client')->id())
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->get();

        return view('CLIENT.appointments.index', compact('appointments'));
    }
}






