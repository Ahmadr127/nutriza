@extends('layouts.app')

@section('title', 'Customer Testimonials')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-900">Ulasan Pelanggan</h2>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Testimoni
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Before / After</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pelanggan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komentar</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($testimonials as $testimoni)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    @if($testimoni->before_image)
                                        <img src="{{ Storage::url($testimoni->before_image) }}" class="w-12 h-12 object-cover rounded shadow" title="Before">
                                    @endif
                                    @if($testimoni->after_image)
                                        <i class="fas fa-arrow-right text-gray-300"></i>
                                        <img src="{{ Storage::url($testimoni->after_image) }}" class="w-12 h-12 object-cover rounded shadow" title="After">
                                    @endif
                                    @if(!$testimoni->before_image && !$testimoni->after_image)
                                        <span class="text-xs text-gray-400 italic">Tanpa Gambar</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-bold text-gray-900">{{ $testimoni->customer_name }}</div>
                            </td>
                            <td class="px-6 py-4 text-yellow-500">
                                @for($i=1; $i<=5; $i++)
                                    <i class="{{ $i <= $testimoni->rating ? 'fas' : 'far' }} fa-star"></i>
                                @endfor
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600 line-clamp-2" title="{{ $testimoni->comment }}">{{ Str::limit($testimoni->comment, 60) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.testimonials.edit', $testimoni->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <form action="{{ route('admin.testimonials.destroy', $testimoni->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus testimoni ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada testimoni.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
