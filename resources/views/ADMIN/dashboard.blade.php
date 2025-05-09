@extends('dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-purple-900 mb-8">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Adoptions Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-purple-600 text-white">
                <h2 class="text-xl font-bold mb-2">Adoption Requests</h2>
                <p class="text-purple-100">Manage dog adoption requests</p>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Total Requests</span>
                    <span class="text-2xl font-bold text-purple-800">{{ \App\Models\Adoption::count() }}</span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Pending</span>
                    <span class="text-xl font-bold text-yellow-600">{{ \App\Models\Adoption::where('status', 'pending')->count() }}</span>
                </div>
                <a href="{{ route('admin.adoptions.index') }}" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors mt-4">
                    View All Requests
                </a>
            </div>
        </div>
        
        <!-- Appointments Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-blue-600 text-white">
                <h2 class="text-xl font-bold mb-2">Appointments</h2>
                <p class="text-blue-100">Manage veterinary appointments</p>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Total Appointments</span>
                    <span class="text-2xl font-bold text-blue-800">{{ \App\Models\Appointment::count() }}</span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Upcoming</span>
                    <span class="text-xl font-bold text-green-600">{{ \App\Models\Appointment::where('appointment_date', '>=', now()->format('Y-m-d'))->count() }}</span>
                </div>
                <a href="{{ route('admin.appointments.index') }}" class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition-colors mt-4">
                    View All Appointments
                </a>
            </div>
        </div>
        
        <!-- Dogs Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-green-600 text-white">
                <h2 class="text-xl font-bold mb-2">Dogs</h2>
                <p class="text-green-100">Manage dogs available for adoption</p>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Total Dogs</span>
                    <span class="text-2xl font-bold text-green-800">{{ \App\Models\Dog::count() }}</span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Available</span>
                    <span class="text-xl font-bold text-purple-600">{{ \App\Models\Dog::where('status', 'available')->count() }}</span>
                </div>
                <a href="{{ route('admin.dogs.index') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors mt-4">
                    Manage Dogs
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
