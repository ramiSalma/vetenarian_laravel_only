<section id="medcare" class="py-16 bg-white">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-4 text-purple-950">Veterinary Services</h2>
      <p class="text-gray-500 text-purple-500 max-w-xl mx-auto mb-12">
        Because of the shorter lifespan of our pets, we stress annual physical examinations for every animal. Thorough check-ups and preventive care can help alleviate serious health problems. We offer a wide range of veterinary services to keep your companions feeling their best.
      </p>
  
      <div class="relative w-full flex justify-center items-center">
        <div class="relative w-[200px] h-[200px] sm:w-[340px] sm:h-[340px] md:w-[380px] md:h-[380px]">
          <div class="absolute rounded-blop inset-0 bg-purple-300 rounded-full z-0"></div>
          <img
            src="{{ asset('images/doctorDog.png') }}"
            alt="Dog with pencil"
            class="absolute -top-2 scale-x-[2] scale-y-[2] left-1/2 transform -translate-x-1/2 w-[500px] sm:w-[600px] md:w-[700px] z-10"
          />
  
          <!-- Feature 1: Pet Bathing -->
          <div class="absolute -left-64 top-1/4 flex items-center text-left">
            <div>
              <h4 class="font-semibold text-right text-purple-950">Pet Bathing</h4>
              <p class="text-sm text-gray-500 max-w-[220px] text-right">
                We offer comprehensive pet bathing services to keep your pet clean, comfortable, and healthy.
              </p>
            </div>
            <div class="w-12 h-12 rounded-full bg-yellow-200 flex items-center justify-center ml-2">🐶</div>
          </div>
  
          <!-- Feature 2: Pet Behavioral Counseling -->
          <div class="absolute -right-64 top-1/4 flex items-center text-right">
            <div class="w-[60px] h-[60px] mr-3 rounded-full bg-pink-200 flex items-center justify-center">👨‍⚕️</div>
            <div>
              <h4 class="font-semibold text-left text-purple-950">Pet Behavioral Counseling</h4>
              <p class="text-sm text-gray-500 max-w-[220px] text-left">
                We offer comprehensive pet behavioral counseling to help address these challenges.
              </p>
            </div>
          </div>
  
          <!-- Feature 3: Pet Boarding -->
          <div class="absolute -left-62 bottom-12 z-20 flex items-center text-left">
            <div>
              <h4 class="font-semibold text-right text-purple-950">Pet Boarding</h4>
              <p class="text-sm text-gray-500 max-w-[220px] text-right">
                We offer comprehensive boarding services for a safe, comfortable, and engaging environment for your pets while you’re away.
              </p>
            </div>
            <div class="w-[60px] h-[60px] ml-3 rounded-full bg-yellow-200 flex items-center justify-center">🐱</div>
          </div>
  
          <!-- Feature 4: Pet Dentistry -->
          <div class="absolute -right-66 bottom-13 flex items-center text-right z-15">
            <div class="w-[60px] h-[60px] mr-3 rounded-full bg-orange-200 flex items-center justify-center">💊</div>
            <div>
              <h4 class="font-semibold text-left text-purple-950">Pet Dentistry</h4>
              <p class="text-sm text-gray-500 max-w-[220px] text-left">
                Our comprehensive pet dentistry services maintain your pet’s oral health at the highest standard.
              </p>
            </div>
          </div>
        </div>
      </div>
  
      <div class="mt-20">
        @php
          $isClientLoggedIn = Auth::guard('client')->check();
        @endphp
        
        @if($isClientLoggedIn)
          <a href="{{ route('client.appointments.create') }}" class="px-6 py-3 mb-[10px] -mt-30 bg-purple-950 hover:bg-purple-600 text-white rounded-full text-sm font-semibold shadow-md transition">
            Request an Appointment
          </a>
        @else
          <a href="{{ route('login') }}" class="px-6 py-3 mb-[10px] -mt-30 bg-purple-950 hover:bg-purple-600 text-white rounded-full text-sm font-semibold shadow-md transition">
            Request an Appointment
          </a>
        @endif
      </div>
    </div>
  </section>
  
