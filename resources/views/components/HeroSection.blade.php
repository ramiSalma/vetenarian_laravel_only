<section class="bg-purple-300 text-center h-[600px] pt-28 p-10 relative overflow-hidden">
  <!-- Floating bg1 Image on the bottom right -->
  <img
    src="{{ asset('images/bg1.png') }}"
    alt="Pet Care"
    class="absolute right-0 bottom-0 w-[700px] object-contain pointer-events-none"
  />

  <!-- Circle with bg5 image in top-left with opacity, image bigger than the circle -->
  <div class="absolute top-40 left-40 overflow-visible z-0 flex items-center justify-center">
    <img
      src="{{ asset('images/bg5.png') }}"
      alt="Jumping Pet"
      class="w-[200px] -translate-y-10"
    />
  </div>

  <!-- Centered Content -->
  <div class="relative z-10 max-w-2xl mx-auto">
    <h1 class="text-7xl text-purple-950 font-bold mb-4">
      We take care your <br /> pets with experts
    </h1>
    <p class="mb-6 ml-40 w-[400px] text-purple-600">
      Dedicated and loving home care, now from certified pet experts. Your pet's happiness is our top priority.
    </p>
    <div class="flex justify-center gap-4 mb-6">
      @php
        $isClientLoggedIn = Auth::guard('client')->check();
      @endphp
      
      @if($isClientLoggedIn)
        <a href="{{ route('client.appointments.create') }}" class="bg-purple-950 text-white px-6 py-3 rounded-[10px]">
          Request an Appointment
        </a>
        <a href="{{ route('client.dogs.index') }}" class="text-purple-950 px-6 py-3 adopt text-xl font-bold">
          Adopt an Animal
        </a>
      @else
        <a href="{{ route('login') }}" class="bg-purple-950 text-white px-6 py-3 rounded-[10px]">
          Request an Appointment
        </a>
        <a href="{{ route('login') }}" class="text-purple-950 px-6 py-3 adopt text-xl font-bold">
          Adopt an Animal
        </a>
      @endif
    </div>
  </div>
</section>
