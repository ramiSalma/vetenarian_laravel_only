<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    
        <x-navbar />
    
        <div class="flex h-screen">
        {{-- Login Form --}}
        <div class="w-full md:w-1/2 bg-purple-950 text-white flex flex-col justify-center px-12">
            <div class="max-w-md mx-auto w-full">
                <h2 class="text-3xl font-bold mb-2">Login</h2>
                <p class="text-sm mb-6 text-gray-400">Enter your account details</p>

                @if(session('error'))
                    <p class="text-red-500 text-sm text-center mb-4">{{ session('error') }}</p>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="text-red-500 text-sm mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                    @csrf

                    <select name="user_type" required class="w-full bg-transparent p-3 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option class="bg-purple-500" value="" disabled {{ old('user_type') ? '' : 'selected' }}>Select user type</option>
                        <option class="bg-purple-500" value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Administrator</option>
                        <option class="bg-purple-500" value="veterinarian" {{ old('user_type') == 'veterinarian' ? 'selected' : '' }}>Veterinarian</option>
                        <option class="bg-purple-500" value="client" {{ old('user_type') == 'client' ? 'selected' : '' }}>Client</option>
                    </select>

                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        class="w-full bg-transparent p-3 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                        required
                    >

                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="w-full bg-transparent p-3 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                        required
                    >

                    <button
                        type="submit"
                        class="w-full bg-purple-600 hover:bg-purple-700 transition text-white py-2 rounded-md"
                    >
                        Login
                    </button>
                </form>

                <div class="mt-6 text-center text-gray-400 text-sm">
                    Don’t have an account?
                    <a href="#" class="ml-2 text-white bg-purple-700 px-4 py-1 rounded-md">Sign up</a>
                </div>
            </div>
        </div>

        {{-- Welcome Panel --}}
        <div class="hidden md:flex md:w-1/2 bg-white items-center justify-center text-white relative">
            <div class="text-center p-8 max-w-md">
                <h1 class="text-4xl text-purple-950 font-bold mb-4">Welcome to<br>student portal</h1>
                <p class="text-sm text-purple-950">Login to access your account</p>
            </div>
            <img
                src="https://t4.ftcdn.net/jpg/00/40/41/59/240_F_40415982_v0Z17uaeDwEYIPouQzinlYbrggnbgPMS.jpg"
                alt="Illustration"
                class="absolute bottom-0 right-0 w-3/4"
            >
        </div>
    </div>
</body>
</html>


