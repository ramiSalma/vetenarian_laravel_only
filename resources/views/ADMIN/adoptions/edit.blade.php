@extends('ADMIN.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-purple-800">Edit Adoption</h1>
            <a href="{{ route('admin.adoptions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                <i class="fas fa-arrow-left mr-1"></i>Back
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.adoptions.update', $adoption) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Client</label>
                    <select id="client_id" name="client_id" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ $adoption->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="dog_id" class="block text-sm font-medium text-gray-700 mb-1">Dog</label>
                    <select id="dog_id" name="dog_id" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                        <option value="">Select Dog</option>
                        @foreach($dogs as $dog)
                            <option value="{{ $dog->id }}" {{ $adoption->dog_id == $dog->id ? 'selected' : '' }}>
                                {{ $dog->name }} ({{ $dog->type }}, {{ $dog->age }} years)
                                {{ $dog->status !== 'available' && $dog->id != $adoption->dog_id ? ' - Not Available' : '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('dog_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                        <option value="pending" {{ $adoption->status == 'pending' ? 'selected' : '' }}>