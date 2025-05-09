@extends('dashboard')

@section('title', 'Available Dogs')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <h1 class="text-3xl font-bold text-purple-800 mb-6">Dogs Available for Adoption</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($dogs as $dog)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($dog->image)
                <img src="{{ asset('storage/' . $dog->image) }}" alt="{{ $dog->name }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No image available</span>
                </div>
            @endif
            
            <div class="p-4">
                <h2 class="text-xl font-bold text-purple-800">{{ $dog->name }}</h2>
                <p class="text-gray-600">{{ $dog->type }}, {{ $dog->age }} {{ $dog->age == 1 ? 'year' : 'years' }} old</p>
                
                <div class="mt-4">
                    <a href="{{ route('client.adoptions.create') }}?dog_id={{ $dog->id }}" 
                       class="inline-block bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
                        Request Adoption
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


