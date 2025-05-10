<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DogController extends Controller
{
    public function __construct()
    {
        // Ensure the dogs directory exists in storage
        $storageDogsPath = storage_path('app/public/dogs');
        if (!file_exists($storageDogsPath)) {
            mkdir($storageDogsPath, 0755, true);
            Log::info('Created directory: ' . $storageDogsPath);
        }
        
        // Ensure the public storage link exists
        $publicStoragePath = public_path('storage');
        if (!file_exists($publicStoragePath)) {
            Log::warning('Public storage link does not exist. Run "php artisan storage:link"');
        }
    }

    public function index(Request $request)
    {
        $query = Dog::latest();
        
        // Filter by type if provided
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }
        
        // Filter by status if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        // Filter by age if provided
        if ($request->has('age') && !empty($request->age)) {
            $query->where('age', $request->age);
        }
        
        $dogs = $query->paginate(12);
        
        // Return the dogs index view instead of dashboard
        return view('ADMIN.dogs.index', compact('dogs'));
    }

    public function create()
    {
        return view('ADMIN.dogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'status' => 'required|in:available,adopted',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dogs', 'public');
            $data['image'] = $imagePath;
        }

        Dog::create($data);
        
        return redirect()->route('admin.dogs.index')
            ->with('success', 'Dog added successfully!');
    }

    public function show(Dog $dog)
    {
        return view('ADMIN.dogs.show', compact('dog'));
    }

    public function edit(Dog $dog)
    {
        return view('ADMIN.dogs.edit', compact('dog'));
    }

    public function update(Request $request, Dog $dog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'status' => 'required|in:available,adopted',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($dog->image) {
                Storage::disk('public')->delete($dog->image);
            }
            
            $imagePath = $request->file('image')->store('dogs', 'public');
            $data['image'] = $imagePath;
        }

        $dog->update($data);

        return redirect()->route('admin.dogs.index')
            ->with('success', 'Dog updated successfully!');
    }

    public function destroy(Dog $dog)
    {
        // Delete image if exists
        if ($dog->image) {
            Storage::disk('public')->delete($dog->image);
        }
        
        $dog->delete();

        return redirect()->route('admin.dogs.index')
            ->with('success', 'Dog deleted successfully!');
    }

    /**
     * Display a listing of available dogs for clients
     */
    public function clientIndex()
    {
        $dogs = Dog::where('status', 'available')->get();
        
        // Try with lowercase path
        return view('client.dogs.index', compact('dogs'));
    }
}



























