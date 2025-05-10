<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Dogtober')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body class="bg-gray-100">
    <x-navbar />
    <x-admin-navbar />
    
    <main class="pt-4">
        @if(session('success'))
            <div class="container mx-auto px-4 mb-4">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="container mx-auto px-4 mb-4">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <x-footer />
    
    @yield('scripts')
</body>
</html>
