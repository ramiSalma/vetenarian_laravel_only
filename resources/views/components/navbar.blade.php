<nav id="navbar" 
     class="fixed top-0 w-full z-50 flex flex-col md:flex-row justify-between items-center p-4 transition-colors duration-300 bg-purple-300"
     x-data="{ isScrolled: false, mobileMenuOpen: false }"
     x-init="window.addEventListener('scroll', () => { isScrolled = window.scrollY > 0 })">
    
    <div class="w-full md:w-auto flex justify-between items-center">
        <a href="#" 
           class="text-2xl font-bold flex items-center gap-2"
           :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
            
            <img src="{{ asset('images/icon1.png') }}" 
                 alt="Logo" 
                 class="w-[35px]">
            Dogtober
        </a>
        
        <!-- Mobile menu button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" 
                class="md:hidden focus:outline-none"
                :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Navbar Links and Content -->
    <div class="flex flex-col md:flex-row w-full md:w-auto items-center"
         :class="{'hidden md:flex': !mobileMenuOpen, 'flex pt-4': mobileMenuOpen}">
        
        <ul class="flex flex-col md:flex-row items-center gap-4 md:gap-6 font-medium w-full md:w-auto mb-4 md:mb-0">
            <li class="w-full md:w-auto text-center">
                <a href="{{ url('/') }}"
                   class="block py-2 md:py-0"
                   :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
                    Home
                </a>
            </li>
            <li class="w-full md:w-auto text-center">
                <a href="#services"
                   class="block py-2 md:py-0"
                   :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
                    Services
                </a>
            </li>
            <li class="w-full md:w-auto text-center">
                <a href="#training"
                   class="block py-2 md:py-0"
                   :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
                    Training
                </a>
            </li>
            <li class="w-full md:w-auto text-center">
                <a href="#medcare"
                   class="block py-2 md:py-0"
                   :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
                    Med Care
                </a>
            </li>
            <li class="w-full md:w-auto text-center">
                <a href="{{ route('adoption') }}"
                   class="block py-2 md:py-0"
                   :class="{ 'text-white': isScrolled, 'text-purple-950': !isScrolled }">
                    Adoption
                </a>
            </li>
        </ul>

        
    
    </div>
    <div>
        @php
        $guards = ['admin', 'veterinarian', 'client'];
        $user = null;
        $guardName = null;
    
        foreach ($guards as $g) {
            if (Auth::guard($g)->check()) {
                $user = Auth::guard($g)->user();
                $guardName = ucfirst($g);
                break;
            }
        }
        @endphp
        
        @if (!$user)
            <a href="{{ route('login') }}" class="w-full md:w-auto text-center">
                <button class="bg-purple-950 text-white px-5 py-2 rounded-[10px] w-full md:w-auto">
                    Sign Up
                </button>
            </a>
        @else
            <div class="mt-4 ml-5 md:mt-0 flex items-center gap-4 text-white">
                <span class="font-semibold hidden md:block">{{ $guardName }}: {{ $user->name ?? $user->full_name }}</span>
        
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-purple-700 hover:bg-purple-600 text-white px-4 py-2 rounded-xl">
                        Logout
                    </button>
                </form>
            </div>
        @endif
    </div>
</nav>

<div>
    {{ $slot }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get navbar element
        const navbar = document.getElementById('navbar');
        
        // Function to toggle navbar background based on scroll position
        function handleScroll() {
            if (window.scrollY > 0) {
                navbar.classList.remove('bg-purple-300');
                navbar.classList.add('bg-purple-950');
                
                // Change text colors
                document.querySelectorAll('#navbar a:not(.bg-purple-950)').forEach(link => {
                    link.classList.remove('text-purple-950');
                    link.classList.add('text-white');
                });
                
                // Change logo
                const logo = navbar.querySelector('img');
                if (logo.src.includes('icon1.png')) {
                    logo.src = logo.src.replace('icon1.png', 'icon2.png');
                }
            } else {
                navbar.classList.remove('bg-purple-950');
                navbar.classList.add('bg-purple-300');
                
                // Change text colors back
                document.querySelectorAll('#navbar a:not(.bg-purple-950)').forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-purple-950');
                });
                
                // Change logo back
                const logo = navbar.querySelector('img');
                if (logo.src.includes('icon2.png')) {
                    logo.src = logo.src.replace('icon2.png', 'icon1.png');
                }
            }
        }
        
        // Add scroll event listener
        window.addEventListener('scroll', handleScroll);
        
        // Initialize state on page load
        handleScroll();
        
        // Mobile menu toggle functionality
        const menuButton = navbar.querySelector('button');
        const menuContent = navbar.querySelector('div:nth-child(2)');
        
        if (menuButton) {
            menuButton.addEventListener('click', function() {
                // Toggle mobile menu
                if (menuContent.classList.contains('hidden')) {
                    menuContent.classList.remove('hidden');
                    menuContent.classList.add('flex', 'pt-4');
                } else {
                    menuContent.classList.add('hidden');
                    menuContent.classList.remove('flex', 'pt-4');
                }
            });
        }
        
        // Close mobile menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768 && menuContent) { // md breakpoint
                menuContent.classList.remove('hidden');
                menuContent.classList.add('flex');
                menuContent.classList.remove('pt-4');
            }
        });
    });
</script>
