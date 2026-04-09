@props(['settings'])

<footer class="bg-gray-900 text-gray-300 py-16 border-t font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            
            <!-- Brand & Desc -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    @if(!empty($settings['navbar_logo']))
                        <img class="h-10 w-auto rounded-full grayscale opacity-80 bg-white p-1" src="{{ Storage::url($settings['navbar_logo']) }}" alt="Logo">
                    @endif
                    <span class="font-serif font-bold text-2xl text-white">{{ $settings['site_name'] ?? 'Nutriza' }}</span>
                </div>
                <p class="text-gray-400 leading-relaxed max-w-sm mb-6">
                    {{ $settings['footer_description'] ?? 'Nutrisi tepat untuk hidup lebih sehat.' }}
                </p>
                <div class="flex space-x-4">
                    @if(!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-brand-600 hover:text-white transition">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_tiktok']))
                    <a href="{{ $settings['social_tiktok'] }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-brand-600 hover:text-white transition">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    @endif
                    @if(!empty($settings['social_facebook']))
                    <a href="{{ $settings['social_facebook'] }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-brand-600 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="text-white font-semibold text-lg mb-6">Menu Cepat</h4>
                <ul class="space-y-3">
                    <li><a href="#programs" class="hover:text-brand-500 transition">Program Diet</a></li>
                    <li><a href="#benefits" class="hover:text-brand-500 transition">Kenapa Kami?</a></li>
                    <li><a href="#menus" class="hover:text-brand-500 transition">Menu Hari Ini</a></li>
                    <li><a href="#faq" class="hover:text-brand-500 transition">FAQ</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-semibold text-lg mb-6">Hubungi Kami</h4>
                <ul class="space-y-4">
                    @if(!empty($settings['contact_whatsapp']))
                    <li class="flex items-start">
                        <svg class="h-5 w-5 mr-3 text-brand-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ $settings['contact_whatsapp'] }}</span>
                    </li>
                    @endif
                    @if(!empty($settings['contact_email']))
                    <li class="flex items-start">
                        <svg class="h-5 w-5 mr-3 text-brand-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $settings['contact_email'] }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        
        <div class="mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Nutriza' }}. All rights reserved. Built with ❤️ for healthier life.
        </div>
    </div>
</footer>
