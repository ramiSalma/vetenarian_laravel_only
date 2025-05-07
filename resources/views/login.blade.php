<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Student Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">

<div class="flex h-screen">
    {{-- Login Form --}}
    <div class="w-full md:w-1/2 bg-purple-950 text-white flex flex-col justify-center px-12">
        <div class="max-w-md mx-auto w-full">
            <h2 class="text-3xl font-bold mb-2">Login</h2>
            <p class="text-sm mb-6 text-gray-400">Enter your account details</p>

            @if(session('error'))
                <p class="text-red-500 text-sm text-center mb-4">{{ session('error') }}</p>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

                <select name="user_type" required class="w-full bg-gray-800 p-3 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="" disabled selected>Select user type</option>
                    <option value="admin">Administrator</option>
                    <option value="veterinarian">Veterinarian</option>
                    <option value="client">Client</option>
                </select>

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full bg-gray-800 p-3 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full bg-gray-800 p-3 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
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
    <div class="hidden md:flex md:w-1/2 bg-purple-500 items-center justify-center text-white relative">
        <div class="text-center p-8 max-w-md">
            <h1 class="text-4xl font-bold mb-4">Welcome to<br><span class="text-white">student portal</span></h1>
            <p class="text-sm">Login to access your account</p>
        </div>
        <img
            src="{{ asset('assets/student-illustration.png') }}"
            alt="Illustration"
            class="absolute bottom-0 right-0 w-1/2"
        >
    </div>
</div>

</body>
</html>
