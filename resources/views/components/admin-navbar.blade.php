<nav class="bg-purple-800 mt-20 text-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-4">
                <a href="{{ route('admin.dogs.index') }}" class="py-4 px-2 font-medium hover:text-purple-200 {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.dogs.*') ? 'border-b-2 border-white' : '' }}">
                    <i class="fas fa-dog mr-2"></i>Animals
                </a>
                <a href="{{ route('admin.appointments.index') }}" class="py-4 px-2 font-medium hover:text-purple-200 {{ request()->routeIs('admin.appointments.*') ? 'border-b-2 border-white' : '' }}">
                    <i class="fas fa-calendar-check mr-2"></i>Appointments
                </a>
                <a href="{{ route('admin.adoptions.index') }}" class="py-4 px-2 font-medium hover:text-purple-200 {{ request()->routeIs('admin.adoptions.*') ? 'border-b-2 border-white' : '' }}">
                    <i class="fas fa-heart mr-2"></i>Adoptions
                </a>
            </div>
        </div>
    </div>
</nav>







