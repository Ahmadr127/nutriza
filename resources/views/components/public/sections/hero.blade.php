@props(['hero', 'settings'])

@php
    $waPhone = preg_replace('/[^0-9]/', '', $settings['contact_whatsapp'] ?? '6281234567890');
    $waLink = "https://wa.me/{$waPhone}?text=Halo%20Nutriza,%20saya%20ingin%20berkonsultasi%20tentang%20program%20diet.";
@endphp

@if($hero)
<section class="relative bg-brand-50 pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden clip-path-bottom">
    <div class="absolute inset-0 z-0">
        @if($hero->image)
            <img src="{{ Storage::url($hero->image) }}" alt="Hero Background" class="w-full h-full object-cover object-center opacity-30 select-none">
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
            
            @if($hero->cta_text)
            <div class="flex justify-center lg:justify-start">
                <a href="{{ $waLink }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-brand-900 bg-white hover:bg-brand-50 shadow-xl transition-all duration-300 md:text-lg animate-bounce group" style="animation-duration: 2s;">
                    <span class="mr-2">Konsultasi Sekarang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                </a>
            </div>
            @endif
        </div>
        
        <!-- Optional Decorative Element on Right Side -->
        <div class="hidden lg:block w-1/2 relative mt-12 lg:mt-0">
            <div class="absolute inset-0 bg-brand-500 rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
            @if($hero->image)
                <img src="{{ Storage::url($hero->image) }}" class="relative z-10 rounded-2xl shadow-2xl rotate-3 hover:rotate-0 transition duration-500 border-8 border-white object-cover h-[500px] w-full" alt="Healthy Food">
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
