@extends('dashboard')

@section('title', 'My Appointments')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-purple-800">My Appointments</h1>
        <a href="{{ route('client.appointments.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
            <i class="fas fa-plus mr-1"></i>Book New Appointment
        </a>
    </div>
    
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($appointments->isEmpty())
            <div class="p-8 text-center">
                <div class="text-purple-400 mb-4">
                    <i class="fas fa-calendar-times text-5xl"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-700 mb-2">No Appointments Yet</h3>
                <p class="text-gray-500 mb-4">You haven't scheduled any appointments yet. Book your first appointment now!</p>
                <a href="{{ route('client.appointments.create') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white py-2 px-6 rounded-md transition-colors">
                    Book an Appointment
                </a>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Pet Name</th>
                        <th class="py-3 px-4 text-left">Date & Time</th>
                        <th class="py-3 px-4 text-left">Veterinarian</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($appointments as $appointment)
                        <tr>
                            <td class="py-3 px-4">
                                <div class="font-medium text-gray-800">{{ $appointment->pet_name }}</div>
                                <div class="text-sm text-gray-500">{{ $appointment->dog_type ?? 'Not specified' }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium text-gray-800">{{ date('M d, Y', strtotime($appointment->appointment_date)) }}</div>
                                <div class="text-sm text-gray-500">{{ date('h:i A', strtotime($appointment->appointment_time)) }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium text-gray-800">{{ $appointment->veterinarian->name ?? 'Not assigned' }}</div>
                            </td>
                            <td class="py-3 px-4">
                                @if($appointment->status === 'pending')
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Pending</span>
                                @elseif($appointment->status === 'confirmed')
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Confirmed</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Cancelled</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                @if($appointment->status === 'pending')
                                    <a href="#" class="text-red-500 hover:text-red-700 transition-colors mr-2">
                                        <i class="fas fa-times-circle"></i> Cancel
                                    </a>
                                @else
                                    <span class="text-gray-400">No actions available</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection