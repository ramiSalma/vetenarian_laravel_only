@extends('dashboard')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('title', $dog->name . ' - Details')

@section('content')
<div class="flex justify-center mt-30">
    <div class="w-full max-w-3xl">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-purple-600 text-white px-6 py-4">
                <h4 class="text-xl font-bold"><i class="fas fa-paw mr-2"></i>Dog Details</h4>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-6 md:mb-0 md:pr-4">
                        <div class="flex justify-center">
                            @if($dog->image)
                                <img src="{{ asset('storage/' . $dog->image) }}" alt="{{ $dog->name }}" class="rounded-lg shadow-md max-h-72 object-cover">
                            @else
                                <div class="w-full h-72 bg-gray-200 flex items-center justify-center rounded-lg shadow-md">
                                    <span class="text-gray-500">No Image</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $dog->name }}</h2>
                        
                        <div class="mb-4">
                            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full {{ $dog->status == 'available' ? 'bg-green-500' : 'bg-gray-500' }} text-white">
                                {{ ucfirst($dog->status) }}
                            </span>
                        </div>
                        
                        <div class="space-y-2 text-gray-700">
                            <div class="flex">
                                <span class="font-medium w-32"><i class="fas fa-tag mr-2"></i>Type/Breed:</span>
                                <span>{{ $dog->type }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32"><i class="fas fa-birthday-cake mr-2"></i>Age:</span>
                                <span>{{ $dog->age }} {{ $dog->age == 1 ? 'year' : 'years' }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32"><i class="fas fa-calendar-alt mr-2"></i>Added on:</span>
                                <span>{{ $dog->created_at ? $dog->created_at->format('M d, Y') : 'N/A' }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-32"><i class="fas fa-clock mr-2"></i>Last updated:</span>
                                <span>{{ $dog->updated_at ? $dog->updated_at->format('M d, Y H:i') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-between mt-8">
                    <a href="{{ route('admin.dogs.index') }}" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded-md transition-colors">
                        <i class="fas fa-arrow-left mr-1"></i>Back to List
                    </a>
                    <div class="space-x-2">
                        <a href="{{ route('admin.dogs.edit', $dog) }}" class="bg-amber-500 hover:bg-amber-600 text-white py-2 px-4 rounded-md transition-colors inline-block">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.dogs.destroy', $dog) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md transition-colors" 
                                onclick="return confirm('Are you sure you want to delete this dog?')">
                                <i class="fas fa-trash mr-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @if($dog->status == 'available')
        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6 border-t-4 border-green-500">
            <div class="bg-green-500 text-white px-6 py-3">
                <h5 class="text-lg font-bold"><i class="fas fa-heart mr-2"></i>Adoption Information</h5>
            </div>
            <div class="p-6">
                <p class="text-lg font-medium mb-2">This dog is currently available for adoption!</p>
                <p class="text-gray-600 mb-4">If someone is interested in adopting {{ $dog->name }}, they can contact the shelter directly. You can update the status to "adopted" once the dog finds a forever home.</p>
                
                <form action="{{ route('ADMIN.update', $dog) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="name" value="{{ $dog->name }}">
                    <input type="hidden" name="type" value="{{ $dog->type }}">
                    <input type="hidden" name="age" value="{{ $dog->age }}">
                    <input type="hidden" name="status" value="adopted">
                    
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition-colors" 
                        onclick="return confirm('Mark {{ $dog->name }} as adopted?')">
                        <i class="fas fa-check-circle mr-1"></i>Mark as Adopted
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="bg-white mb-60 shadow-md rounded-lg overflow-hidden mt-6 border-t-4 border-gray-400">
            <div class="bg-gray-500 text-white px-6 py-3">
                <h5 class="text-lg font-bold"><i class="fas fa-home mr-2"></i>Adoption Status</h5>
            </div>
            <div class="p-6 ">
                <p class="text-lg font-medium mb-2">This dog has already been adopted!</p>
                <p class="text-gray-600 mb-4">{{ $dog->name }} has found a forever home. If you need to change the status back to available, you can use the form below.</p>
                
                <form action="{{ route('ADMIN.update', $dog) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="name" value="{{ $dog->name }}">
                    <input type="hidden" name="type" value="{{ $dog->type }}">
                    <input type="hidden" name="age" value="{{ $dog->age }}">
                    <input type="hidden" name="status" value="available">
                    
                    <button type="submit" class="border border-gray-500 text-gray-500 hover:bg-gray-50 px-4 py-2 rounded-md transition-colors" 
                        onclick="return confirm('Mark {{ $dog->name }} as available?')">
                        <i class="fas fa-undo mr-1"></i>Mark as Available
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
