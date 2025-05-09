@extends('dashboard')

@section('content')
<section class="relative py-16 bg-purple-50 overflow-hidden">
  <!-- Background Image -->
  <div class="absolute inset-0 bg-cover bg-center opacity-10"
       style="background-image: url('{{ asset('images/bg1.png') }}');"></div>

  <div class="relative z-10 container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-purple-950 mb-2">
        Book a Veterinary Appointment
      </h2>
      <p class="text-purple-500 max-w-xl mx-auto">
        Schedule your pet's next visit with ease. Our professional vets are here to care for your furry companions.
      </p>
    </div>
    
    <form action="{{ route('appointments.store') }}" method="POST" class="max-w-2xl mx-auto">
      @csrf
      <!-- Form fields -->
      <button type="submit" class="w-full py-3 px-6 bg-purple-700 hover:bg-purple-800 text-white font-medium rounded-lg">
        Book Appointment
      </button>
    </form>
  </div>
</section>
@endsection
