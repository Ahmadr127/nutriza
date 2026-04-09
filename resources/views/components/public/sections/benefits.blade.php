@props(['benefits'])

@if($benefits && $benefits->count() > 0)
<section id="benefits" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold text-brand-600 tracking-wide uppercase mb-2">Kenapa Nutriza?</h2>
            <p class="mt-2 text-3xl leading-8 font-serif font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Cara Cerdas Memulai Hidup Sehat
            </p>
            <p class="mt-4 max-w-2xl text-lg text-gray-500 mx-auto">
                Pilihan Diet Catering Terbaik Untuk Kamu!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($benefits as $benefit)
            <div class="relative bg-gray-50 rounded-2xl p-8 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-transparent hover:border-brand-100 group">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-brand-100 rounded-full mix-blend-multiply filter blur-xl opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                
                <div class="flex items-center justify-center h-16 w-16 rounded-xl bg-brand-100 text-brand-600 mb-6 group-hover:bg-brand-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                    @if($benefit->icon)
                        {!! $benefit->icon !!}
                    @else
                        <!-- Default Icon -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @endif
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $benefit->title }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $benefit->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
