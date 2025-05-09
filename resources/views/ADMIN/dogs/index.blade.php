@extends('dashboard')

@section('title', 'Manage Dogs')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-purple-800">Dogs Management</h1>
        <a href="{{ route('admin.dogs.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
            <i class="fas fa-plus mr-1"></i>Add New Dog
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="{{ route('admin.dogs.index') }}" method="GET" class="flex flex-wrap items-center gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Filter by Type/Breed</label>
                <input type="text" id="type" name="type" value="{{ request('type') }}" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"
                       placeholder="Enter dog breed">
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                <select id="status" name="status" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200">
                    <option value="">All Statuses</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="adopted" {{ request('status') == 'adopted' ? 'selected' : '' }}>Adopted</option>
                </select>
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Filter by Age</label>
                <input type="number" id="age" name="age" value="{{ request('age') }}" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"
                       placeholder="Enter age">
            </div>
            
            <div class="flex items-end space-x-2">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-search mr-1"></i>Filter
                </button>
                
                <a href="{{ route('admin.dogs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
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

    <!-- Dogs Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($dogs as $dog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    @if($dog->image)
                        <img src="{{ asset('storage/' . $dog->image) }}" alt="{{ $dog->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-dog text-gray-400 text-4xl"></i>
                        </div>
                    @endif
                    <div class="absolute top-2 right-2">
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $dog->status == 'available' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($dog->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="p-4">
                    <h3 class="text-xl font-bold text-purple-900 mb-2">{{ $dog->name }}</h3>
                    <div class="text-gray-600 mb-4">
                        <p><span class="font-medium">Breed:</span> {{ $dog->type }}</p>
                        <p><span class="font-medium">Age:</span> {{ $dog->age }} years</p>
                    </div>
                    
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('admin.dogs.show', $dog) }}" class="text-purple-600 hover:text-purple-800 transition-colors">
                            <i class="fas fa-eye mr-1"></i>View
                        </a>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.dogs.edit', $dog) }}" class="text-amber-500 hover:text-amber-700 transition-colors">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.dogs.destroy', $dog) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" 
                                    onclick="return confirm('Are you sure you want to delete this dog?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8 text-gray-500">
                <i class="fas fa-dog text-4xl mb-3"></i>
                <p>No dogs found. Add a new dog to get started!</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $dogs->links() }}
    </div>
</div>
@endsection