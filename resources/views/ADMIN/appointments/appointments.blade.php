@extends('dashboard')

@section('title', 'Appointments Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-purple-800">Appointments Management</h1>
        <a href="{{ route('admin.appointments.create') }}" class="bg-purple-950 hover:bg-purple-600 text-white py-2 px-4 rounded-md transition-colors">
            <i class="fas fa-plus mr-1"></i>New Appointment
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="{{ route('admin.appointments.index') }}" method="GET" class="flex flex-wrap items-center gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                <select id="status" name="status" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Filter by Date</label>
                <input type="date" id="date" name="date" value="{{ request('date') }}" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <label for="veterinarian" class="block text-sm font-medium text-gray-700 mb-1">Filter by Veterinarian</label>
                <input type="text" id="veterinarian" name="veterinarian" value="{{ request('veterinarian') }}" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"
                       placeholder="Enter veterinarian name">
            </div>
            
            <div class="flex items-end space-x-2">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-search mr-1"></i>Filter
                </button>
                
                <a href="{{ route('admin.appointments.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-undo mr-1"></i>Reset
                </a>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-purple-700 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Client</th>
                        <th class="py-3 px-4 text-left">Veterinarian</th>
                        <th class="py-3 px-4 text-left">Date</th>
                        <th class="py-3 px-4 text-left">Time</th>
                        <th class="py-3 px-4 text-left">Dog Type</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                
                <tbody class="text-purple-950">
                @forelse ($appointments as $appointment)
                    <tr class="border-t border-purple-200 hover:bg-purple-50">
                        <td class="py-3 px-4">{{ $appointment->client->full_name ?? 'Unknown' }}</td>
                        <td class="py-3 px-4">
                            @if($appointment->veterinarian)
                                {{ $appointment->veterinarian->full_name ?? $appointment->veterinarian->name ?? 'Name Not Found' }}
                            @else
                                Unknown (No Relationship)
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $appointment->appointment_date }}</td>
                        <td class="py-3 px-4">{{ $appointment->appointment_time }}</td>
                        <td class="py-3 px-4">{{ $appointment->dog_type ?? '-' }}</td>
                        <td class="py-3 px-4">
                            <span class="inline-block px-2 py-1 rounded-full 
                                @if($appointment->status === 'pending') bg-yellow-100 text-yellow-800 
                                @elseif($appointment->status === 'confirmed') bg-green-100 text-green-800 
                                @else bg-red-100 text-red-800 
                                @endif">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.appointments.edit', $appointment) }}" class="text-amber-500 hover:text-amber-700 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($appointment->status !== 'confirmed')
                                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" 
                                        onclick="return confirm('Are you sure you want to delete this appointment?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-6 text-center text-gray-500">No appointments found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-6">
        {{ $appointments->appends(request()->query())->links() }}
    </div>
</div>
@endsection




