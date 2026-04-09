@props(['programs', 'settings'])

@php
    $waPhone = preg_replace('/[^0-9]/', '', $settings['contact_whatsapp'] ?? '6281234567890');
@endphp

@if($programs && $programs->count() > 0)
<section id="programs" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold text-brand-600 tracking-wide uppercase mb-2">Pilihan Program</h2>
            <p class="mt-2 text-3xl leading-8 font-serif font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Rancang Diet Sesuai Kebutuhan Anda
            </p>
            <p class="mt-4 max-w-2xl text-lg text-gray-500 mx-auto">
                Setiap orang memiliki target yang berbeda. Pilih program yang dirancang spesifik untuk kondisi dan tujuan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($programs as $program)
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 flex flex-col group cursor-pointer border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    @if($program->image)
                        <img src="{{ $program->image }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-in-out">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                    <h3 class="absolute bottom-4 left-6 text-2xl font-bold text-white">{{ $program->name }}</h3>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <p class="text-gray-600 flex-1 mb-6">{{ $program->description }}</p>
                    
                    <a href="https://wa.me/{{ $waPhone }}?text=Halo%20Nutriza,%20saya%20tertarik%20konsultasi%20untuk%20{{ urlencode($program->name) }}." target="_blank" class="inline-flex items-center justify-center gap-2 w-full bg-brand-50 text-brand-700 font-semibold py-3 px-4 rounded-xl group-hover:bg-brand-600 group-hover:text-white transition duration-300 shadow-sm hover:shadow-md animate-pulse hover:animate-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
                        Konsultasi via WA
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
