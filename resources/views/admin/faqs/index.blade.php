@extends('layouts.app')

@section('title', 'FAQs')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-900">FAQ (Tanya Jawab)</h2>
        <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah FAQ
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Urutan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pertanyaan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jawaban</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($faqs as $faq)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $faq->display_order }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $faq->question }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 line-clamp-2" title="{{ $faq->answer }}">{{ Str::limit($faq->answer, 80) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus FAQ ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada FAQ.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
