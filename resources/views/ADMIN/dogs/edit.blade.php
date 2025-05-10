@extends('dashboard')

@section('title', 'Edit Dog')

@section('content')
<div class="flex justify-center m-30">
    <div class="w-full max-w-2xl">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-purple-500 text-white px-6 py-4">
                <h4 class="text-xl font-bold"><i class="fas fa-edit mr-2"></i>Edit Dog: {{ $dog->name }}</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.dogs.update', $dog) }}" class="grid grid-cols-2 gap-2" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="name" class="block text-purple-700 font-medium mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('name') border-red-500 @enderror" 
                            id="name" name="name" value="{{ old('name', $dog->name) }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="type" class="block text-purple-700 font-medium mb-2">Type/Breed <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('type') border-red-500 @enderror" 
                            id="type" name="type" value="{{ old('type', $dog->type) }}" required>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="age" class="block text-purple-700 font-medium mb-2">Age (Years) <span class="text-red-500">*</span></label>
                        <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('age') border-red-500 @enderror" 
                            id="age" name="age" min="0" value="{{ old('age', $dog->age) }}" required>
                        @error('age')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="status" class="block text-purple-700 font-medium mb-2">Status <span class="text-red-500">*</span></label>
                        <select class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('status') border-red-500 @enderror" 
                            id="status" name="status" required>
                            <option value="available" {{ old('status', $dog->status) == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="adopted" {{ old('status', $dog->status) == 'adopted' ? 'selected' : '' }}>Adopted</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="image" class="block text-purple-700 font-medium mb-2">Image</label>
                        @if($dog->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $dog->image) }}" alt="{{ $dog->name }}" class="h-48 w-auto object-cover rounded-md border">
                                <p class="text-gray-500 text-sm mt-1">Current image</p>
                            </div>
                        @endif
                        <input type="file" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('image') border-red-500 @enderror" 
                            id="image" name="image">
                        <p class="text-gray-500 text-sm mt-1">Leave empty to keep the current image. Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                   <br>
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('admin.dogs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-arrow-left mr-1"></i>Back
                        </a>
                        <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-save mr-1"></i>Update Dog
                        </button>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    
    document.getElementById('image').onchange = function() {
        const [file] = this.files;
        if (file) {
            console.log('New file selected:', file.name);
        }
    };
</script>
@endsection
