<nav class="bg-purple-800 mt-20 text-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-4">
                <a href="{{ route('client.appointments.index') }}" class="py-4 px-2 font-medium hover:text-purple-200 {{ request()->routeIs('client.appointments.*') ? 'border-b-2 border-white' : '' }}">
                    <i class="fas fa-calendar-check mr-2"></i>My Appointments
                </a>
                <a href="{{ route('client.dogs.index') }}" class="py-4 px-2 font-medium hover:text-purple-200 {{ request()->routeIs('client.dogs.*') ? 'border-b-2 border-white' : '' }}">
                    <i class="fas fa-dog mr-2"></i>Adopt a Pet
                </a>
                <a href="{{ route('client.adoptions.index') }}" class="py-4 px-2 font-medium hover:text-purple-200 {{ request()->routeIs('client.adoptions.*') ? 'border-b-2 border-white' : '' }}">
                    <i class="fas fa-heart mr-2"></i>My Adoption Requests
                </a>
            </div>
        </div>
    </div>
</nav>
