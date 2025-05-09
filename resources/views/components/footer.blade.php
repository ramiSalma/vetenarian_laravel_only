
<footer class="bg-purple-950 text-white px-5 py-8 font-sans border-t border-gray-200">
    <div class="flex flex-col items-center text-center">

        
        <div class="mb-8">
            <h3 class="font-bold text-4xl mb-4 flex items-center gap-2">
                <img src="{{ asset('./images/icon2.png') }}" alt="logo" class="w-[35px]" />
                dogtober
            </h3>

            
            <div class="flex flex-wrap justify-center gap-y-2">
                @php
                    $navItems = ["Home", "About Us", "Services", "How to use", "Benefit", "Blog", "Contact Us"];
                @endphp
                
                @foreach ($navItems as $index => $item)
                    <a
                        href="#"
                        class="text-sm hover:underline px-3 {{ $index !== count($navItems) - 1 ? 'border-r border-white' : '' }}"
                    >
                        {{ $item }}
                    </a>
                @endforeach
            </div>
        </div>

        
        <div class="mb-8 flex flex-col sm:flex-row gap-8 sm:gap-20 items-center">
            
           
            <div class="flex items-center justify-center w-72 p-4 rounded">
                <div class="w-16 h-16 mr-4 rounded-full bg-purple-300 flex items-center justify-center text-purple-900 text-xl skew-y-12">
                    <i class="fa fa-map-marker-alt"></i>
                </div>
                <div class="text-left">
                    <h4 class="font-bold text-sm mb-1">Address</h4>
                    <p class="text-sm">2020 Guide III<br>Myriad Books, SC 29077</p>
                </div>
            </div>

            
            <div class="flex items-center justify-center w-72 p-4 rounded">
                <div class="w-16 h-16 mr-4 rounded-full bg-purple-300 flex items-center justify-center text-purple-900 text-xl skew-y-12">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="text-left">
                    <h4 class="font-bold text-sm mb-1">Phone</h4>
                    <p class="text-sm">+03 327 456 789<br>+09 487 646 212</p>
                </div>
            </div>

            
            <div class="flex items-center justify-center w-72 p-4 rounded">
                <div class="w-16 h-16 mr-4 rounded-full bg-purple-300 flex items-center justify-center text-purple-900 text-xl skew-y-12">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="text-left">
                    <h4 class="font-bold text-sm mb-1">Email</h4>
                    <p class="text-sm">Ewapooshinter@gmail.com</p>
                </div>
            </div>
        </div>

        
        <div class="text-xs">
            Copyright © {{ date('Y') }} The Pine Adviser. All rights reserved.
            <img src="{{ asset('images/footer-img.png') }}" class="w-[700px]" alt="" />
        </div>
    </div>
</footer>