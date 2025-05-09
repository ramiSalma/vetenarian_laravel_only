@extends('dashboard')

@section('title', 'Appointment Details')

@section('content')
<div class="flex justify-center m-30">
    <div class="w-full max-w-2xl">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-purple-500 text-white px-6 py-4 flex justify-between items-center">
                <h4 class="text-xl font-bold"><i class="fas fa-calendar-check mr-2"></i>Appointment Details</h4>
                <span class="inline-block px-3 py-1 rounded-full 
                    @if($appointment->status === 'pending') bg-yellow-100 text-yellow-800 
                    @elseif($appointment->status === 'confirmed') bg-green-100 text-green-800 
                    @else bg-red-100 text-red-800 
                    @endif">
                    {{ ucfirst($appointment->status) }}
                </span>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Client</h5>
                        <p class="text-lg">{{ $appointment->client->full_name ?? 'Unknown' }}</p>
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Veterinarian</h5>
                        <p class="text-lg">{{ $appointment->veterinarian->name ?? 'Unknown' }}</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Pet Name</h5>
                        <p class="text-lg">{{ $appointment->pet_name }}</p>
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Owner Name</h5>
                        <p class="text-lg">{{ $appointment->owner_name }}</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Date</h5>
                        <p class="text-lg">{{ $appointment->appointment_date }}</p>
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Time</h5>
                        <p class="text-lg">{{ $appointment->appointment_time }}</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Dog Type</h5>
                        <p class="text-lg">{{ $appointment->dog_type ?? '-' }}</p>
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-gray-500 mb-1">Dog Age</h5>
                        <p class="text-lg">{{ $appointment->dog_age ? $appointment->dog_age . ' years' : '-' }}</p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h5 class="text-sm font-semibold text-gray-500 mb-1">Notes</h5>
                    <p class="text-lg">{{ $appointment->concern_notes ?? '-' }}</p>
                </div>
                
                <div class="flex justify-between mt-8">
                    <a href="{{ route('admin.appointments.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                        <i class="fas fa-arrow-left mr-1"></i>Back
                    </a>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.appointments.edit', $appointment) }}" class="bg-amber-500 hover:bg-amber-600 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md transition-colors" 
                                onclick="return confirm('Are you sure you want to delete this appointment?')">
                                <i class="fas fa-trash mr-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection