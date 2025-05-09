@extends('dashboard')

@section('content')
<div class="max-w-6xl mx-auto m-30 p-6 bg-purple-50 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-purple-950 mb-6">My Appointments</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-purple-700 rounded-md shadow">
            <thead class="bg-purple-700 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Client</th>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Dog Type</th>
                    <th class="py-3 px-4 text-left">Dog Age</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Action</th>
                </tr>
            </thead>
            
            <tbody class="text-purple-950">
            @foreach ($appointments as $appointment)
                <tr class="border-t border-purple-200 hover:bg-purple-100">
                    <td class="py-3 px-4">{{ $appointment->client->full_name ?? 'Unknown' }}</td>
                    <td class="py-3 px-4">{{ $appointment->date }}</td>
                    <td class="py-3 px-4">
                        <span class="inline-block px-2 py-1 rounded-full 
                            @if($appointment->status === 'pending') bg-yellow-100 text-yellow-800 
                            @elseif($appointment->status === 'confirmed') bg-green-100 text-green-800 
                            @else bg-red-100 text-red-800 
                            @endif">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td class="py-3 px-4">{{ $appointment->dog_type ?? '-' }}</td>
                    <td class="py-3 px-4">{{ $appointment->dog_age ? $appointment->dog_age . ' years' : '-' }}</td>

                    <td class="py-3 px-4">
                        @if ($appointment->status === 'pending')
                            <div class="flex space-x-2">
                                <form action="{{ route('veterinarian.appointments.updateStatus', $appointment) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">Confirm</button>
                                </form>
                                <form action="{{ route('veterinarian.appointments.updateStatus', $appointment) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">Reject</button>
                                </form>
                            </div>
                        @else
                            <span class="text-gray-500">-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
