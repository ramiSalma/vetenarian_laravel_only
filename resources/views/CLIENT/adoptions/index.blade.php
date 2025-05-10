@extends('dashboard')

@section('title', 'My Adoption Requests')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-purple-800">My Adoption Requests</h1>
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
        @if($adoptions->isEmpty())
            <div class="p-8 text-center">
                <div class="text-purple-400 mb-4">
                    <i class="fas fa-heart-broken text-5xl"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-700 mb-2">No Adoption Requests Yet</h3>
                <p class="text-gray-500 mb-4">You haven't made any adoption requests yet. Browse our available dogs and find your perfect companion!</p>
                <a href="{{ route('adoption') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white py-2 px-6 rounded-md transition-colors">
                    Find a Dog to Adopt
                </a>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Dog</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Requested On</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-purple-950">
                    @foreach($adoptions as $adoption)
                        <tr class="border-t border-purple-200 hover:bg-purple-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center">
                                    @if($adoption->dog && $adoption->dog->image)
                                        <img src="{{ asset('storage/' . $adoption->dog->image) }}" alt="{{ $adoption->dog->name }}" class="w-10 h-10 rounded-full object-cover mr-3">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-purple-200 flex items-center justify-center mr-3">
                                            <i class="fas fa-dog text-purple-500"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-medium">{{ $adoption->dog->name ?? 'Unknown Dog' }}</p>
                                        <p class="text-sm text-gray-500">{{ $adoption->dog->type ?? '' }}, {{ $adoption->dog->age ?? '' }} {{ ($adoption->dog && $adoption->dog->age == 1) ? 'year' : 'years' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="inline-block px-2 py-1 rounded-full 
                                    @if($adoption->status === 'pending') bg-yellow-100 text-yellow-800 
                                    @elseif($adoption->status === 'approved') bg-green-100 text-green-800 
                                    @else bg-red-100 text-red-800 
                                    @endif">
                                    {{ ucfirst($adoption->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $adoption->created_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4">
                                @if($adoption->status === 'pending')
                                    <form action="{{ route('client.adoptions.cancel', $adoption) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" 
                                            onclick="return confirm('Are you sure you want to cancel this adoption request?')">
                                            <i class="fas fa-times-circle mr-1"></i>Cancel Request
                                        </button>
                                    </form>
                                @elseif($adoption->status === 'approved')
                                    <span class="text-green-600">
                                        <i class="fas fa-check-circle mr-1"></i>Approved on {{ $adoption->adopted_at->format('M d, Y') }}
                                    </span>
                                @else
                                    <span class="text-gray-500">
                                        <i class="fas fa-ban mr-1"></i>Request Rejected
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Pagination -->
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                {{ $adoptions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection