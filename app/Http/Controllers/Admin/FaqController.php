<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = \App\Models\Faq::orderBy('display_order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $faq = new \App\Models\Faq();
        return view('admin.faqs.form', compact('faq'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'display_order' => 'nullable|integer',
        ]);

        \App\Models\Faq::create($validated);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $faq = \App\Models\Faq::findOrFail($id);
        return view('admin.faqs.form', compact('faq'));
    }

    public function update(Request $request, string $id)
    {
        $faq = \App\Models\Faq::findOrFail($id);
        
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'display_order' => 'nullable|integer',
        ]);

        $faq->update($validated);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $faq = \App\Models\Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
