@props(['settings'])

<nav x-data="{ mobileMenuOpen: false, scrolled: false }"
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'bg-white shadow-md': scrolled, 'bg-transparent': !scrolled }"
     class="fixed w-full z-50 transition-all duration-300">
     
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-3">
                @if(!empty($settings['site_logo']))
                    <img class="h-10 w-auto rounded-full shadow-sm" src="{{ $settings['site_logo'] }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
                @endif
                <a href="#" class="font-serif font-bold text-2xl tracking-tight text-brand-700">
                    {{ $settings['site_name'] ?? 'Nutriza' }}
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#programs" class="text-gray-600 hover:text-brand-600 font-medium transition">Program Diet</a>
                <a href="#menus" class="text-gray-600 hover:text-brand-600 font-medium transition">Menu</a>
                <a href="#testimonials" class="text-gray-600 hover:text-brand-600 font-medium transition">Testimoni</a>
                <a href="#faq" class="text-gray-600 hover:text-brand-600 font-medium transition">FAQ</a>
                <a href="#contact" class="bg-brand-600 text-white px-6 py-2.5 rounded-full font-semibold shadow-lg shadow-brand-500/30 hover:bg-brand-700 hover:scale-105 transition transform">Gabung Sekarang</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-gray-600 hover:text-brand-600 focus:outline-none p-2">
                    <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" x-show="mobileMenuOpen" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-white shadow-xl absolute w-full border-t border-gray-100">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="#programs" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-brand-50">Program Diet</a>
            <a href="#menus" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-brand-50">Menu</a>
            <a href="#testimonials" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-brand-50">Testimoni</a>
            <a href="#faq" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-brand-50">FAQ</a>
            <div class="mt-4 pt-4 border-t border-gray-100 px-3">
                <a href="#contact" @click="mobileMenuOpen = false" class="w-full text-center block bg-brand-600 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-brand-700">Gabung Sekarang</a>
            </div>
        </div>
    </div>
</nav>
