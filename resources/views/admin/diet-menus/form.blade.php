@extends('layouts.app')

@section('title', $menu->exists ? 'Edit Menu Diet' : 'Tambah Menu Diet')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $menu->exists ? 'Edit Menu Diet' : 'Tambah Menu Diet Baru' }}</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ $menu->exists ? route('admin.diet-menus.update', $menu->id) : route('admin.diet-menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($menu->exists) @method('PUT') @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hari</label>
                        <select name="day" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                                <option value="{{ $day }}" {{ old('day', $menu->day) == $day ? 'selected' : '' }}>{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe / Sesi (ex: Lunch, Dinner)</label>
                        <input type="text" name="meal_type" value="{{ old('meal_type', $menu->meal_type) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Makanan Lengkap</label>
                    <input type="text" name="food_name" value="{{ old('food_name', $menu->food_name) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kalori (kKal)</label>
                    <input type="number" name="calories" value="{{ old('calories', $menu->calories) }}" class="w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Menu</label>
                    @if($menu->image)
                        <img src="{{ Storage::url($menu->image) }}" class="w-32 h-32 object-cover rounded-lg mb-3">
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.diet-menus.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
