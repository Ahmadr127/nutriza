@props(['programs'])

<section id="contact" class="py-24 bg-white relative overflow-hidden">
    <!-- Decorative element -->
    <div class="absolute inset-0 bg-brand-50 transform skew-y-3 origin-bottom-left z-0"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">
            
            <!-- Context Left -->
            <div class="bg-brand-600 text-white p-12 lg:w-5/12 flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 -tr-24 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
                
                <div class="relative z-10">
                    <h3 class="text-3xl font-serif font-bold mb-4">Mulai Perjalanan Sehat Anda Hari Ini</h3>
                    <p class="text-brand-100 text-lg mb-8">
                        Tinggalkan informasi Anda dan konsultan gizi kami akan segera menghubungi untuk mendiskusikan program yang paling tepat.
                    </p>
                    
                    <ul class="space-y-6">
                        <li class="flex items-center gap-4">
                            <div class="bg-brand-500 p-2 rounded-full hidden sm:block">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-brand-50 font-medium">Respon cepat dalam 30 menit</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="bg-brand-500 p-2 rounded-full hidden sm:block">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <span class="text-brand-50 font-medium">Privasi data 100% terjamin</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Form Right -->
            <div class="p-12 lg:w-7/12">
                @if(session('success'))
                    <div class="bg-green-50 text-green-800 border-l-4 border-green-500 p-4 mb-8 rounded-r-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="bg-red-50 text-red-800 border-l-4 border-red-500 p-4 mb-8 rounded-r-md">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('lead.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-brand-500 focus:border-brand-500 transition">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor WhatsApp *</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-brand-500 focus:border-brand-500 transition">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Utama (Opsional)</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-brand-500 focus:border-brand-500 transition">
                    </div>

                    <div>
                        <label for="program_interest" class="block text-sm font-medium text-gray-700">Pilih Program yang Diminati</label>
                        <select id="program_interest" name="program_interest" class="mt-1 block w-full bg-white border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-brand-500 focus:border-brand-500 transition">
                            <option value="">Belum Yakin (Perlu Konsultasi)</option>
                            @if($programs)
                                @foreach($programs as $program)
                                    <option value="{{ $program->name }}" {{ old('program_interest') == $program->name ? 'selected' : '' }}>{{ $program->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan / Kondisi Medis (Opsional)</label>
                        <textarea id="message" name="message" rows="3" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-brand-500 focus:border-brand-500 transition">{{ old('message') }}</textarea>
                        <p class="mt-2 text-sm text-gray-500">Info tambahan membantu kami menyesuaikan diet Anda secara presisi.</p>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent shadow-xl shadow-brand-500/20 text-sm font-bold rounded-xl text-white bg-brand-600 hover:bg-brand-700 hover:-translate-y-1 transition duration-300">
                            Kirim Formulir Konsultasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
