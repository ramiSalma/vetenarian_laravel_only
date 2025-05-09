<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dogtober')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <x-navbar />
    
    @php
    $isAdmin = Auth::guard('admin')->check();
    $isClient = Auth::guard('client')->check();
    @endphp
    
    @if($isAdmin)
        <x-admin-navbar />
    @elseif($isClient)
        <x-client-navbar />
    @endif
    
    @yield('content')
    @if (!View::hasSection('content'))
        <x-HeroSection />
        <x-Features />
        <x-adoption />
        <x-about />
        <x-visitdoctor />
        <x-services />
    @endif
    <x-footer />
</body>
</html>



