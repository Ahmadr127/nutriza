@extends('layouts.app')

@section('title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $faq->exists ? 'Edit FAQ' : 'Tambah FAQ Baru' }}</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ $faq->exists ? route('admin.faqs.update', $faq->id) : route('admin.faqs.store') }}" method="POST">
                @csrf
                @if($faq->exists) @method('PUT') @endif

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                    <input type="text" name="question" value="{{ old('question', $faq->question) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jawaban</label>
                    <textarea name="answer" rows="5" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">{{ old('answer', $faq->answer) }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil (Order)</label>
                    <input type="number" name="display_order" value="{{ old('display_order', $faq->display_order ?? 0) }}" class="w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
