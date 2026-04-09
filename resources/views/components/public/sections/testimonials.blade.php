@props(['testimonials'])

@if($testimonials && $testimonials->count() > 0)
<section id="testimonials" class="py-24 bg-brand-900 text-white relative overflow-hidden">
    <!-- SVG Pattern Background -->
    <div class="absolute inset-0 opacity-10">
        <svg fill="none" viewBox="0 0 100 100" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <pattern id="pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
            </pattern>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern)"></rect>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold text-brand-400 tracking-wide uppercase mb-2">Testimoni</h2>
            <p class="mt-2 text-3xl leading-8 font-serif font-extrabold tracking-tight sm:text-4xl">
                Apa Kata Mereka?
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ min($testimonials->count(), 3) }} gap-8">
            @foreach($testimonials as $testi)
            <div class="bg-gray-800/80 backdrop-blur-sm p-8 rounded-3xl border border-gray-700 shadow-xl relative">
                
                <!-- Quote Icon -->
                <div class="absolute -top-4 right-8 bg-brand-500 text-white p-3 rounded-full">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 32 32"><path d="M10 8c-4.418 0-8 3.582-8 8s3.582 8 8 8c1.378 0 2.67-.35 3.821-.954C12.38 24.168 10.602 26 8 26v4c4.418 0 8-3.582 8-8V8h-6zm16 0c-4.418 0-8 3.582-8 8s3.582 8 8 8c1.378 0 2.67-.35 3.821-.954C28.38 24.168 26.602 26 24 26v4c4.418 0 8-3.582 8-8V8h-6z"/></svg>
                </div>

                <div class="flex items-center gap-1 mb-6 text-yellow-400">
                    @for($i=0; $i<$testi->rating; $i++)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>

                <p class="text-gray-300 text-lg italic mb-6">"{{ $testi->comment }}"</p>
                
                @if($testi->before_image && $testi->after_image)
                <div class="flex gap-2 mb-6">
                    <div class="w-1/2 relative">
                        <img src="{{ $testi->before_image }}" class="w-full h-32 object-cover rounded-lg" alt="Before">
                        <span class="absolute bottom-1 right-1 bg-black/60 text-white text-[10px] px-2 py-0.5 rounded">Before</span>
                    </div>
                    <div class="w-1/2 relative">
                        <img src="{{ $testi->after_image }}" class="w-full h-32 object-cover rounded-lg" alt="After">
                        <span class="absolute bottom-1 right-1 bg-brand-500/80 text-white text-[10px] px-2 py-0.5 rounded">After</span>
                    </div>
                </div>
                @endif
                
                <h4 class="font-bold text-xl text-white">{{ $testi->customer_name }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
