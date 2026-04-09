@props(['programs'])

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
                    
                    <a href="#contact" class="inline-block text-center w-full bg-brand-50 text-brand-700 font-semibold py-3 px-4 rounded-xl group-hover:bg-brand-600 group-hover:text-white transition duration-300 shadow-sm hover:shadow-md">
                        Pilih Program
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
