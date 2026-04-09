@props(['faqs'])

@if($faqs && $faqs->count() > 0)
<section id="faq" class="py-24 bg-gray-50 border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold text-brand-600 tracking-wide uppercase mb-2">FAQ</h2>
            <p class="mt-2 text-3xl leading-8 font-serif font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Pertanyaan yang Sering Diajukan
            </p>
        </div>

        <div class="bg-white shadow-xl shadow-gray-200/50 rounded-3xl overflow-hidden divide-y divide-gray-100 border border-gray-100">
            @foreach($faqs as $faq)
            <div x-data="{ expanded: false }" class="w-full">
                <button @click="expanded = !expanded" class="w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 text-lg pr-4">{{ $faq->question }}</span>
                    <span class="ml-6 flex-shrink-0">
                        <!-- Icon plus/minus -->
                        <svg class="h-6 w-6 text-brand-500 transform transition-transform duration-300" :class="{ 'rotate-180': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="expanded" x-collapse x-cloak>
                    <div class="px-8 pb-6 text-gray-600 bg-gray-50 leading-relaxed text-base pt-2">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
