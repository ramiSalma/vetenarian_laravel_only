<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['client', 'veterinarian'])
            ->latest();
        
        // Filter by status if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        // Filter by date if provided
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('appointment_date', $request->date);
        }
        
        // Filter by veterinarian name if provided
        if ($request->has('veterinarian') && !empty($request->veterinarian)) {
            $query->whereHas('veterinarian', function($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->veterinarian . '%');
            });
        }
        
        $appointments = $query->paginate(10);
        
        // Fix: Use the correct view name that matches your file
        return view('ADMIN.appointments.appointments', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $veterinarians = Veterinarian::all();
        // Fix: Use the correct view name that matches your file
        return view('ADMIN.appointments.create_appointment', compact('clients', 'veterinarians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'pet_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'concern_notes' => 'nullable|string',
            'dog_type' => 'nullable|string|max:255',
            'dog_age' => 'nullable|integer|min:0',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Appointment::create($validated);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        // Fix: Use the correct view name that matches your file
        return view('ADMIN.appointments.show_appointment', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $clients = Client::all();
        $veterinarians = Veterinarian::all();
        // Fix: Use the correct view name that matches your file
        return view('ADMIN.appointments.edit_appointment', compact('appointment', 'clients', 'veterinarians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'pet_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'concern_notes' => 'nullable|string',
            'dog_type' => 'nullable|string|max:255',
            'dog_age' => 'nullable|integer|min:0',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $appointment->update($validated);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}






