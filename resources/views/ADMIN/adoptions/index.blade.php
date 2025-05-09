@extends('dashboard')

@section('title', 'Manage Adoptions')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-purple-800">Manage Adoption Requests</h1>
        <a href="{{ route('admin.adoptions.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
            <i class="fas fa-plus mr-1"></i>New Adoption
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
    
    <!-- Filter Form -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('admin.adoptions.index') }}" method="GET" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label for="client" class="block text-sm font-medium text-gray-700 mb-1">Client Name</label>
                <input type="text" id="client" name="client" value="{{ request('client') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200" placeholder="Search by client name">
            </div>
            <div class="flex-1 min-w-[200px]">
                <label for="dog" class="block text-sm font-medium text-gray-700 mb-1">Dog Name</label>
                <input type="text" id="dog" name="dog" value="{{ request('dog') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200" placeholder="Search by dog name">
            </div>
            <div class="flex items-end w-full sm:w-auto">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors w-full sm:w-auto">
                    <i class="fas fa-search mr-1"></i>Filter
                </button>
            </div>
        </form>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($adoptions->isEmpty())
            <div class="p-8 text-center">
                <div class="text-purple-400 mb-4">
                    <i class="fas fa-heart-broken text-5xl"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-700 mb-2">No Adoption Requests Found</h3>
                <p class="text-gray-500 mb-4">There are no adoption requests matching your criteria.</p>
                <a href="{{ route('admin.adoptions.index') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white py-2 px-6 rounded-md transition-colors">
                    View All Requests
                </a>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Client</th>
                        <th class="py-3 px-4 text-left">Dog</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Date</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-purple-950">
                    @foreach($adoptions as $adoption)
                        <tr class="border-t border-purple-200 hover:bg-purple-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center">
                                    <div>
                                        <p class="font-medium">{{ $adoption->client->full_name ?? 'Unknown Client' }}</p>
                                        <p class="text-sm text-gray-500">{{ $adoption->client->email ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
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
                            <td class="py-3 px-4">
                                <p>Requested: {{ $adoption->created_at->format('M d, Y') }}</p>
                                @if($adoption->adopted_at)
                                    <p class="text-sm text-green-600">Adopted: {{ $adoption->adopted_at->format('M d, Y') }}</p>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.adoptions.show', $adoption) }}" class="text-blue-500 hover:text-blue-700 transition-colors">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.adoptions.edit', $adoption) }}" class="text-yellow-500 hover:text-yellow-700 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($adoption->status === 'pending')
                                        <form action="{{ route('admin.adoptions.approve', $adoption) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-500 hover:text-green-700 transition-colors" 
                                                onclick="return confirm('Are you sure you want to approve this adoption request?')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.adoptions.reject', $adoption) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" 
                                                onclick="return confirm('Are you sure you want to reject this adoption request?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.adoptions.destroy', $adoption) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" 
                                            onclick="return confirm('Are you sure you want to delete this adoption record? This action cannot be undone.')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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


