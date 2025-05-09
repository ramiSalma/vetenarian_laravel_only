@extends('dashboard')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <h1 class="text-3xl font-bold text-center text-purple-950 mb-8">Dogs Available for Adoption</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($dogs as $dog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-purple-200">
                @if($dog->image)
                    <img src="{{ asset('storage/' . $dog->image) }}" alt="{{ $dog->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-purple-100 flex items-center justify-center">
                        <span class="text-purple-300 text-xl">No Image</span>
                    </div>
                @endif
                
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-purple-900">{{ $dog->name }}</h2>
                    <p class="text-gray-600">Type: {{ $dog->type }}</p>
                    <p class="text-gray-600">Age: {{ $dog->age }} years</p>
                    <p class="text-gray-600 mb-4">Status: {{ ucfirst($dog->status) }}</p>
                    
                    <a href="{{ route('dogs.show', $dog) }}" class="inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
