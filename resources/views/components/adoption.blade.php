<section class="py-16 relative">
    <!-- Background image with overlay style -->
    <div class="absolute inset-0 bg-[url('https://media.istockphoto.com/id/1457493367/vector/pet-paw-seamless-pattern-vector-illustration-with-cat-or-dog-paw-on-purple-background.jpg?s=612x612&w=0&k=20&c=K8z84mTmt5chOaJDHvYe3_UF7eXj1ESxsz1Yxg3MCpI=')] bg-repeat opacity-10 z-0"></div>
  
    <div class="relative z-10 container mx-auto px-4 text-center">
      <p class="text-purple-500 uppercase tracking-wide text-sm mb-2">Meet the animals</p>
      <h2 class="text-3xl md:text-4xl font-bold text-purple-950">Puppies Waiting for Adoption</h2>
      <p class="text-purple-500 mt-2 max-w-2xl mx-auto mb-12">
        The best-suited dog DNA test to Embark Breed & Health Kit view of Chewy, which provides you with a breed breakdown and information about steps.
      </p>
  
      <!-- Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @foreach ([
          ['id' => 'MK07', 'name' => 'Bella', 'gender' => 'Male', 'age' => '12 months', 'price' => '$800 USD', 'image' => asset('images/bgcard1.png')],
          ['id' => 'MO221', 'name' => 'Nova (Larry)', 'gender' => 'Male', 'age' => '10 months', 'price' => '$740 USD', 'image' => asset('images/bgcard2.png')],
          ['id' => 'JH45', 'name' => 'Charlie', 'gender' => 'Female', 'age' => '8 months', 'price' => '$720 USD', 'image' => asset('images/bgcard3.png')]
        ] as $pet)
          <div class="bg-purple-100 p-6 rounded-bl-lg rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
            <img src="{{ $pet['image'] }}" alt="{{ $pet['name'] }}" class="w-full h-64 object-contain mb-4 mx-auto" />
            <h4 class="text-lg font-semibold text-gray-800">{{ $pet['id'] }} - {{ $pet['name'] }}</h4>
            <p class="text-gray-500 text-sm">Gender: {{ $pet['gender'] }}</p>
            <p class="text-gray-500 text-sm">Age: {{ $pet['age'] }}</p>
            <p class="text-purple-700 font-semibold mt-2">{{ $pet['price'] }}</p>
            <button class="bg-purple-900 text-white mt-4 px-4 py-2 rounded-md hover:bg-purple-700">Adopt</button>
          </div>
        @endforeach
      </div>
  
      <!-- Centered button -->
      <div class="mt-12">
        <a href="{{ route('adoption') }}" class="bg-purple-950 text-white font-semibold py-2 px-6 rounded-full shadow hover:bg-purple-800 transition">
          Adopt an Animal
        </a>
      </div>
    </div>
  </section>
  