@props(['hero'])

@if($hero)
<section class="relative bg-brand-50 pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden clip-path-bottom">
    <div class="absolute inset-0 z-0">
        @if($hero->image)
            <img src="{{ $hero->image }}" alt="Hero Background" class="w-full h-full object-cover object-center opacity-30 select-none">
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-brand-900/90 to-brand-800/60 mix-blend-multiply"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center lg:text-left flex flex-col lg:flex-row items-center">
        <div class="w-full lg:w-1/2 pe-0 lg:pe-12">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-extrabold text-white tracking-tight leading-tight mb-6 drop-shadow-lg">
                {{ $hero->title }}
            </h1>
            @if($hero->subtitle)
            <p class="mt-4 text-lg sm:text-xl text-brand-50 mb-10 max-w-2xl mx-auto lg:mx-0 drop-shadow">
                {{ $hero->subtitle }}
            </p>
            @endif
            
            @if($hero->cta_text && $hero->cta_link)
            <div class="flex justify-center lg:justify-start">
                <a href="{{ $hero->cta_link }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-brand-900 bg-white hover:bg-brand-50 hover:scale-105 shadow-xl transition-all duration-300 md:text-lg">
                    {{ $hero->cta_text }}
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
            @endif
        </div>
        
        <!-- Optional Decorative Element on Right Side -->
        <div class="hidden lg:block w-1/2 relative mt-12 lg:mt-0">
            <div class="absolute inset-0 bg-brand-500 rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
            @if($hero->image)
                <img src="{{ $hero->image }}" class="relative z-10 rounded-2xl shadow-2xl rotate-3 hover:rotate-0 transition duration-500 border-8 border-white object-cover h-[500px] w-full" alt="Healthy Food">
            @endif
            
            <!-- Float Badges -->
            <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg flex items-center gap-3 z-20 animate-bounce cursor-default" style="animation-duration: 3s;">
                <div class="bg-green-100 p-2 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-semibold">Telah Dipercaya</p>
                    <p class="text-sm font-bold text-gray-800">10,000+ Pelanggan</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
