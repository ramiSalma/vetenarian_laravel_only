<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAdoptionController extends Controller
{
    /**
     * Display a listing of the client's adoption requests
     */
    public function index()
    {
        $adoptions = Adoption::where('client_id', Auth::guard('client')->id())
            ->with('dog')
            ->latest()
            ->paginate(10);
            
        return view('client.adoptions.index', compact('adoptions'));
    }
    
    /**
     * Show the form for creating a new adoption request
     */
    public function create(Request $request)
    {
        // Make sure dog_id is provided
        if (!$request->has('dog_id')) {
            return redirect()->route('client.dogs.index')
                ->with('error', 'Please select a dog to adopt.');
        }
        
        $dog = Dog::findOrFail($request->dog_id);
        
        // Check if dog is available
        if ($dog->status !== 'available') {
            return redirect()->route('client.dogs.index')
                ->with('error', 'Sorry, this dog is no longer available for adoption.');
        }
        
        // Check if client already has a pending or approved request for this dog
        $existingRequest = Adoption::where('client_id', Auth::guard('client')->id())
            ->where('dog_id', $dog->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();
            
        if ($existingRequest) {
            return redirect()->route('client.adoptions.index')
                ->with('error', 'You already have a request for this dog.');
        }
        
        return view('CLIENT.adoption-request', compact('dog'));
    }
    
    /**
     * Store a new adoption request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dog_id' => 'required|exists:dogs,id',
            'notes' => 'required|string|min:10',
        ]);
        
        $dog = Dog::findOrFail($request->dog_id);
        
        // Check if dog is available
        if ($dog->status !== 'available') {
            return redirect()->route('adoption')
                ->with('error', 'Sorry, this dog is no longer available for adoption.');
        }
        
        // Create adoption request
        Adoption::create([
            'client_id' => Auth::guard('client')->id(),
            'dog_id' => $dog->id,
            'notes' => $validated['notes'],
            'status' => 'pending',
        ]);
        
        return redirect()->route('client.adoptions.index')
            ->with('success', 'Your adoption request has been submitted successfully! We will review it shortly.');
    }
    
    /**
     * Cancel an adoption request
     */
    public function cancel(Adoption $adoption)
    {
        // Check if this adoption belongs to the authenticated client
        if ($adoption->client_id !== Auth::guard('client')->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Check if the adoption is in a cancellable state
        if ($adoption->status !== 'pending') {
            return redirect()->route('client.adoptions.index')
                ->with('error', 'Only pending adoption requests can be cancelled.');
        }
        
        // Delete the adoption request
        $adoption->delete();
        
        return redirect()->route('client.adoptions.index')
            ->with('success', 'Your adoption request has been cancelled.');
    }
}

