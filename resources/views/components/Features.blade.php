
@php
$features = [
  ['icon' => 'icon7.png', 'title' => 'Pet Wellness & Grooming'],
  ['icon' => 'icon8.png', 'title' => 'Best Quality Pet accessories'],
  ['icon' => 'icon6.png', 'title' => 'Best affordable Organic Pet Food'],
];
@endphp
<section id="training" class="relative bg-purple-950 py-24">
    <div class="absolute top-0 left-1/2 -translate-y-1/2 -translate-x-1/2 flex gap-50 z-20">
      @foreach ($features as $feature)
        <div
          class="text-center flex flex-col items-center p-4 rounded-xl shadow-lg bg-purple-300 border-4 border-purple-950"
        >
          <div class="text-2xl"><img class="w-12" src="{{ asset('images/' . $feature['icon']) }}" alt="" /></div>
          <p class="mt-4 font-semibold w-35 text-purple-950">{{ $feature['title'] }}</p>
        </div>
      @endforeach
    </div>
  </section>
  
