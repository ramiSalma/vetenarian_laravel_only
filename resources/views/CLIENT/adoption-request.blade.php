@extends('dashboard')

@section('title', 'Request Adoption')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-purple-800">Request to Adopt {{ $dog->name }}</h1>
            <a href="{{ route('adoption') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                <i class="fas fa-arrow-left mr-1"></i>Back to Dogs
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="md:w-1/3">
                        @if($dog->image)
                            <img src="{{ asset('storage/' . $dog->image) }}" alt="{{ $dog->name }}" class="w-full h-auto rounded-lg">
                        @else
                            <div class="w-full h-48 bg-purple-100 flex items-center justify-center rounded-lg">
                                <span class="text-purple-300 text-xl">No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="md:w-2/3">
                        <h2 class="text-xl font-bold text-purple-800 mb-2">{{ $dog->name }}</h2>
                        <p class="text-gray-600 mb-1"><span class="font-medium">Type:</span> {{ $dog->type }}</p>
                        <p class="text-gray-600 mb-1"><span class="font-medium">Age:</span> {{ $dog->age }} {{ $dog->age == 1 ? 'year' : 'years' }}</p>
                        <p class="text-gray-600 mb-4"><span class="font-medium">Status:</span> 
                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-500 text-white">
                                Available
                            </span>
                        </p>
                    </div>
                </div>
                
                <form action="{{ route('client.adoptions.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="dog_id" value="{{ $dog->id }}">
                    
                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Why do you want to adopt {{ $dog->name }}?</label>
                        <textarea id="notes" name="notes" rows="4" required
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"
                                  placeholder="Please tell us why you want to adopt this dog and a bit about your living situation..."></textarea>
                        @error('notes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-heart mr-1"></i>Submit Adoption Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection