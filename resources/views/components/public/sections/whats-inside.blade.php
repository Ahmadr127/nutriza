@props(['menus'])

@php
    // Flatten the grouped menus into a single collection for the carousel
    $allMenus = $menus->flatten(1);
@endphp

@if($allMenus && $allMenus->count() > 0)
<section id="menus" class="py-24 bg-[#FAF5F0] relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-[#1e4838] opacity-5 filter blur-3xl z-0"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[500px] h-[500px] rounded-full bg-[#356854] opacity-[0.03] filter blur-3xl z-0"></div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="text-sm font-bold text-[#356854] tracking-widest uppercase mb-3 flex items-center gap-2">
                    <span class="w-8 h-[2px] bg-[#356854]"></span> What's Inside
                </h2>
                <p class="text-4xl md:text-5xl font-serif font-extrabold tracking-tight text-gray-900 leading-tight">
                    Intip Menu <span class="text-[#1e4838] italic">Spesial</span> Minggu Ini
                </p>
                <p class="mt-4 text-lg text-gray-600 font-light">
                    Disiapkan segar setiap hari oleh koki profesional kami, memastikan Anda mendapatkan asupan kalori presisi dengan rasa bintang lima.
                </p>
            </div>
            
            <!-- Custom Navigation Hints -->
            <div class="hidden md:flex items-center gap-3">
                <button onclick="document.getElementById('menu-slider').scrollBy({left: -400, behavior: 'smooth'})" class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-[#1e4838] hover:text-white hover:border-[#1e4838] transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="document.getElementById('menu-slider').scrollBy({left: 400, behavior: 'smooth'})" class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-[#1e4838] hover:text-white hover:border-[#1e4838] transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <!-- Horizontal Scroll Carousel -->
        <div id="menu-slider" class="flex overflow-x-auto snap-x snap-mandatory gap-6 lg:gap-10 pb-12 pt-4 px-4 -mx-4 no-scrollbar" style="scroll-behavior: smooth;">
            
            @foreach($allMenus as $menu)
            <div class="snap-center shrink-0 w-[300px] sm:w-[380px] lg:w-[420px] relative group h-[500px]">
                
                <!-- Main Card -->
                <div class="w-full h-full rounded-[2rem] overflow-hidden relative shadow-lg group-hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                    
                    @if($menu->image)
                        <img src="{{ $menu->image }}" alt="{{ $menu->food_name }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                    @else
                        <div class="absolute inset-0 bg-[#e6dbcc] flex items-center justify-center">
                            <span class="font-serif italic text-[#a39481]">Nutriza Dish</span>
                        </div>
                    @endif

                    <!-- Gradient overlays for text readability -->
                    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/60 pointer-events-none"></div>

                    <!-- Day Label (Top Left) -->
                    <div class="absolute top-6 left-6 z-20">
                        <span class="bg-[#FAF5F0] text-[#1e4838] font-bold px-4 py-1.5 rounded-full text-xs tracking-wider uppercase shadow-sm">
                            {{ $menu->day }}
                        </span>
                    </div>

                    <!-- Top Center Badge -->
                    <div class="absolute top-6 inset-x-0 flex justify-center z-20 pointer-events-none">
                        <div class="bg-[#1e4838] border-[1.5px] border-[#3a755d] text-white px-6 py-2 rounded-xl text-center shadow-lg backdrop-blur-sm bg-opacity-95">
                            <div class="font-serif font-bold text-lg text-[#faf5f0]">Batch 14</div>
                            <div class="text-[10px] text-[#a8cfbd] font-medium tracking-widest uppercase">13 - 19 April</div>
                        </div>
                    </div>

                    <!-- Bottom Details -->
                    <div class="absolute bottom-6 inset-x-0 w-full px-6 flex flex-col items-center gap-4 z-20">
                        
                        <!-- Food Box Info -->
                        <div class="w-full bg-[#1e4838] border-[1.5px] border-[#3a755d] text-white p-4 rounded-2xl shadow-xl backdrop-blur-sm bg-opacity-95 text-center transform transition-transform group-hover:-translate-y-1">
                            <h4 class="font-bold text-lg md:text-xl text-[#faf5f0] mb-1">{{ $menu->food_name }}</h4>
                            <p class="text-xs text-[#a8cfbd] font-light tracking-wide">{{ $menu->meal_type }} • Premium Ingredients</p>
                        </div>

                        <!-- Calories -->
                        <div class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-semibold text-gray-800 shadow-sm">
                            🔥 {{ $menu->calories ?? rand(380, 520) }} kKal
                        </div>

                    </div>
                </div>

            </div>
            @endforeach

            <!-- Add a decorative end-cap card if needed -->
            <div class="snap-center shrink-0 w-[50px] sm:w-[100px]"></div>
        </div>

    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</section>
@endif
