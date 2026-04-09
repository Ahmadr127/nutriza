@extends('layouts.app')

@section('title', 'Landing Hero')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-xl font-semibold text-gray-800">Landing Page Hero Section</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ route('admin.landing-hero.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Heading Utama (Title)</label>
                    <input type="text" name="title" value="{{ old('title', $hero->title) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subheading</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $hero->subtitle) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Teks Tombol CTA</label>
                        <input type="text" name="cta_text" value="{{ old('cta_text', $hero->cta_text) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Link Tombol CTA (URL)</label>
                        <input type="text" name="cta_link" value="{{ old('cta_link', $hero->cta_link) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Hero (Samping)</label>
                    @if($hero->image)
                        <img src="{{ Storage::url($hero->image) }}" class="w-48 h-auto object-cover rounded-lg mb-3 shadow">
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
