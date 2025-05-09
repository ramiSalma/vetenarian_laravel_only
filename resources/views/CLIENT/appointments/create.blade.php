@extends('dashboard')

@section('title', 'Book an Appointment')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-purple-800">Book a Veterinary Appointment</h1>
            <a href="{{ route('client.appointments.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                <i class="fas fa-arrow-left mr-1"></i>Back to Appointments
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('client.appointments.store') }}" method="POST" class="p-6">
                @csrf
                
                <div class="mb-4">
                    <label for="veterinarian_id" class="block text-sm font-medium text-gray-700 mb-1">Veterinarian</label>
                    <select id="veterinarian_id" name="veterinarian_id" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                        <option value="">Select Veterinarian</option>
                        @foreach($veterinarians as $vet)
                            <option value="{{ $vet->id }}">{{ $vet->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="pet_name" class="block text-sm font-medium text-gray-700 mb-1">Pet Name</label>
                        <input type="text" id="pet_name" name="pet_name" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    </div>
                    
                    <div>
                        <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-1">Owner Name</label>
                        <input type="text" id="owner_name" name="owner_name" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="appointment_date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" id="appointment_date" name="appointment_date" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    </div>
                    
                    <div>
                        <label for="appointment_time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                        <input type="time" id="appointment_time" name="appointment_time" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="dog_type" class="block text-sm font-medium text-gray-700 mb-1">Dog Type/Breed</label>
                        <input type="text" id="dog_type" name="dog_type"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    </div>
                    
                    <div>
                        <label for="dog_age" class="block text-sm font-medium text-gray-700 mb-1">Dog Age</label>
                        <input type="number" id="dog_age" name="dog_age"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="concern_notes" class="block text-sm font-medium text-gray-700 mb-1">Concerns/Notes</label>
                    <textarea id="concern_notes" name="concern_notes" rows="3"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"></textarea>
                </div>
                
                <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
                    Book Appointment
                </button>
            </form>
        </div>
    </div>
</div>
@endsection