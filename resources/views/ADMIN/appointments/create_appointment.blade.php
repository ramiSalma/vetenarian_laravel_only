@extends('dashboard')

@section('title', 'Create New Appointment')

@section('content')
<div class="flex justify-center m-30">
    <div class="w-full max-w-2xl">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-purple-500 text-white px-6 py-4">
                <h4 class="text-xl font-bold"><i class="fas fa-calendar-plus mr-2"></i>Create New Appointment</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.appointments.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Client</label>
                        <select id="client_id" name="client_id" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
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
                            <label for="dog_type" class="block text-sm font-medium text-gray-700 mb-1">Dog Type</label>
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
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="status" name="status" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="concern_notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                        <textarea id="concern_notes" name="concern_notes" rows="3"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"></textarea>
                    </div>
                    
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('admin.appointments.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-arrow-left mr-1"></i>Back
                        </a>
                        <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-save mr-1"></i>Create Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection