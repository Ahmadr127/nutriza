@extends('layouts.app')

@section('title', $program->exists ? 'Edit Program Diet' : 'Tambah Program Diet')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $program->exists ? 'Edit Program Diet' : 'Tambah Program Diet Baru' }}</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ $program->exists ? route('admin.diet-programs.update', $program->id) : route('admin.diet-programs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($program->exists) @method('PUT') @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Program</label>
                        <input type="text" name="name" value="{{ old('name', $program->name) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                        <input type="text" name="slug" value="{{ old('slug', $program->slug) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil (Order)</label>
                    <input type="number" name="display_order" value="{{ old('display_order', $program->display_order ?? 0) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">{{ old('description', $program->description) }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Program</label>
                    @if($program->image)
                        <img src="{{ Storage::url($program->image) }}" class="w-48 h-32 object-cover rounded-lg mb-3">
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.diet-programs.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
