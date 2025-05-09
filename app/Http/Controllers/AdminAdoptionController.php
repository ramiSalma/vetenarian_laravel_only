<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Dog;
use App\Models\Client;
use Illuminate\Http\Request;

class AdminAdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Adoption::with(['client', 'dog'])->latest();
        
        // Filter by status if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        // Filter by client name if provided
        if ($request->has('client') && !empty($request->client)) {
            $query->whereHas('client', function($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->client . '%');
            });
        }
        
        // Filter by dog name if provided
        if ($request->has('dog') && !empty($request->dog)) {
            $query->whereHas('dog', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->dog . '%');
            });
        }
        
        $adoptions = $query->paginate(10);
        
        return view('ADMIN.adoptions.index', compact('adoptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $dogs = Dog::where('status', 'available')->get();
        return view('ADMIN.adoptions.create', compact('clients', 'dogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'dog_id' => 'required|exists:dogs,id',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);
        
        // Check if dog is available
        $dog = Dog::findOrFail($request->dog_id);
        if ($dog->status !== 'available' && $validated['status'] === 'approved') {
            return back()->with('error', 'This dog is not available for adoption.');
        }
        
        $adoption = Adoption::create($validated);
        
        // If approved, update dog status and set adopted_at
        if ($validated['status'] === 'approved') {
            $dog->update(['status' => 'adopted']);
            $adoption->update(['adopted_at' => now()]);
        }
        
        return redirect()->route('admin.adoptions.index')
            ->with('success', 'Adoption record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        return view('ADMIN.adoptions.show', compact('adoption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        $clients = Client::all();
        $dogs = Dog::all();
        return view('ADMIN.adoptions.edit', compact('adoption', 'clients', 'dogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'dog_id' => 'required|exists:dogs,id',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);
        
        // Get the original status before update
        $originalStatus = $adoption->status;
        
        // Check if dog is available if status is changing to approved
        if ($originalStatus !== 'approved' && $validated['status'] === 'approved') {
            $dog = Dog::findOrFail($request->dog_id);
            if ($dog->status !== 'available' && $dog->id != $adoption->dog_id) {
                return back()->with('error', 'This dog is not available for adoption.');
            }
            
            // Update dog status and set adopted_at date
            $dog->update(['status' => 'adopted']);
            $validated['adopted_at'] = now();
        }
        
        // If status is changing from approved to something else, make the dog available again
        if ($originalStatus === 'approved' && $validated['status'] !== 'approved') {
            $dog = Dog::find($adoption->dog_id);
            if ($dog) {
                $dog->update(['status' => 'available']);
            }
            $validated['adopted_at'] = null;
        }
        
        $adoption->update($validated);
        
        return redirect()->route('admin.adoptions.index')
            ->with('success', 'Adoption record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
        // If adoption was approved, make the dog available again
        if ($adoption->status === 'approved') {
            $dog = Dog::find($adoption->dog_id);
            if ($dog) {
                $dog->update(['status' => 'available']);
            }
        }
        
        $adoption->delete();
        
        return redirect()->route('admin.adoptions.index')
            ->with('success', 'Adoption record deleted successfully!');
    }
    
    /**
     * Approve an adoption request
     */
    public function approve(Adoption $adoption)
    {
        // Check if dog is still available
        $dog = Dog::findOrFail($adoption->dog_id);
        if ($dog->status !== 'available' && $dog->id != $adoption->dog_id) {
            return back()->with('error', 'This dog is no longer available for adoption.');
        }
        
        // Update adoption status
        $adoption->update([
            'status' => 'approved',
            'adopted_at' => now()
        ]);
        
        // Update dog status
        $dog->update(['status' => 'adopted']);
        
        return redirect()->route('admin.adoptions.index')
            ->with('success', 'Adoption request approved successfully!');
    }
    
    /**
     * Reject an adoption request
     */
    public function reject(Adoption $adoption)
    {
        // Update adoption status
        $adoption->update([
            'status' => 'rejected',
            'adopted_at' => null
        ]);
        
        return redirect()->route('admin.adoptions.index')
            ->with('success', 'Adoption request rejected successfully!');
    }
}


