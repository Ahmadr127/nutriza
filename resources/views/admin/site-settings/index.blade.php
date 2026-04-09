@extends('layouts.app')

@section('title', 'Global Site Settings')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-900">Global Settings</h2>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.site-settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Aset Merek (Branding)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Logo Website (Navbar)</label>
                        @if(isset($settings['navbar_logo']))
                            <img src="{{ Storage::url($settings['navbar_logo']) }}" class="w-32 h-auto mb-2 bg-gray-100 p-2 rounded">
                        @endif
                        <input type="file" name="navbar_logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ikon Aplikasi (Favicon)</label>
                        @if(isset($settings['app_favicon']))
                            <img src="{{ Storage::url($settings['app_favicon']) }}" class="w-12 h-12 mb-2 bg-gray-100 p-1 rounded">
                        @endif
                        <input type="file" name="app_favicon" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Sosial Media</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Instagram (URL)</label>
                        <input type="text" name="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://instagram.com/' }}" class="w-full rounded-md border-gray-300">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">TikTok (URL)</label>
                        <input type="text" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? 'https://tiktok.com/' }}" class="w-full rounded-md border-gray-300">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Facebook (URL)</label>
                        <input type="text" name="social_facebook" value="{{ $settings['social_facebook'] ?? 'https://facebook.com/' }}" class="w-full rounded-md border-gray-300">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Kontak & Perusahaan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp Admin (format 628xxx)</label>
                        <input type="text" name="contact_whatsapp" value="{{ $settings['contact_whatsapp'] ?? '6281234567890' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Perusahaan</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'halo@nutriza.id' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Informasi Batch Menu</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Batch (ex: Batch 14)</label>
                        <input type="text" name="menu_batch_name" value="{{ $settings['menu_batch_name'] ?? 'Batch 14' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Batch (ex: 13 - 19 April)</label>
                        <input type="text" name="menu_batch_date" value="{{ $settings['menu_batch_date'] ?? '13 - 19 April' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Hero Badges & CTA</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Trust Badge Title (Hero)</label>
                        <input type="text" name="hero_trust_badge_title" value="{{ $settings['hero_trust_badge_title'] ?? 'Telah Dipercaya' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Trust Badge Subtitle</label>
                        <input type="text" name="hero_trust_badge_subtitle" value="{{ $settings['hero_trust_badge_subtitle'] ?? '10,000+ Pelanggan' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Seksi: Kemudahan (Benefits)</h3>
                <div class="grid grid-cols-1 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Utama</label>
                        <input type="text" name="section_benefits_title" value="{{ $settings['section_benefits_title'] ?? 'Cara Cerdas Memulai Hidup Sehat' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sub Judul / Copywriting</label>
                        <input type="text" name="section_benefits_subtitle" value="{{ $settings['section_benefits_subtitle'] ?? 'Pilihan Diet Catering Terbaik Untuk Kamu!' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-green-800 border-b pb-2 mb-4">Seksi: Program Diet</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Eyebrow Text (Teks kecil)</label>
                        <input type="text" name="section_programs_eyebrow" value="{{ $settings['section_programs_eyebrow'] ?? 'Pilihan Program Diet' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Utama</label>
                        <input type="text" name="section_programs_title" value="{{ $settings['section_programs_title'] ?? 'Diet Terukur, Hasil Nyata' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                    <button type="submit" class="px-6 py-3 font-semibold bg-green-600 text-white rounded-md hover:bg-green-700 shadow-lg transition duration-200">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
