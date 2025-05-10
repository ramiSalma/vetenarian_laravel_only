@extends('dashboard')

@section('title', 'Add New Dog')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white w-[800px] border-2 border-purple-500 mb-10 mt-30 shadow-md rounded-lg overflow-hidden">
            <div class="bg-purple-500 text-white px-6 py-4">
                <h4 class="text-xl font-bold"><i class="fas fa-plus-circle mr-2"></i>Add New Dog</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.dogs.store') }}" class="grid grid-cols-2 gap-2" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4 w-[300px]">
                        <label for="name" class="block text-purple-700 font-medium mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('name') border-red-500 @enderror" 
                            id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4 w-[300px]">
                        <label for="type" class="block text-purple-700 font-medium mb-2">Type/Breed <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('type') border-red-500 @enderror" 
                            id="type" name="type" value="{{ old('type') }}" required>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4 w-[300px]">
                        <label for="age" class="block text-purple-700 font-medium mb-2">Age (Years) <span class="text-red-500">*</span></label>
                        <input type="number" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('age') border-red-500 @enderror" 
                            id="age" name="age" min="0" value="{{ old('age') }}" required>
                        @error('age')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4 w-[300px]">
                        <label for="status" class="block text-purple-700 font-medium mb-2">Status <span class="text-red-500">*</span></label>
                        <select class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('status') border-red-500 @enderror" 
                            id="status" name="status" required>
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="adopted" {{ old('status') == 'adopted' ? 'selected' : '' }}>Adopted</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6 w-[300px]">
                        <label for="image" class="block text-purple-700 font-medium mb-2">Image</label>
                        <input type="file" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 @error('image') border-red-500 @enderror" 
                            id="image" name="image">
                        <p class="text-gray-500 text-sm mt-1">Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                   <br>
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('admin.dogs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-arrow-left mr-1"></i>Back
                        </a>
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md transition-colors">
                            <i class="fas fa-save mr-1"></i>Save Dog
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
    // Preview image before upload
    document.getElementById('image').onchange = function() {
        const [file] = this.files;
        if (file) {
            // You could add image preview functionality here if desired
            console.log('File selected:', file.name);
        }
    };
</script>
@endsection
