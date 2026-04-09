<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = \App\Models\CustomerTestimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $testimonial = new \App\Models\CustomerTestimonial();
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'before_image' => 'nullable|image|max:2048',
            'after_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('before_image')) {
            $validated['before_image'] = $request->file('before_image')->store('testimonials', 'public');
        }
        if ($request->hasFile('after_image')) {
            $validated['after_image'] = $request->file('after_image')->store('testimonials', 'public');
        }

        \App\Models\CustomerTestimonial::create($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $testimonial = \App\Models\CustomerTestimonial::findOrFail($id);
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $testimonial = \App\Models\CustomerTestimonial::findOrFail($id);
        
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'before_image' => 'nullable|image|max:2048',
            'after_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('before_image')) {
            if ($testimonial->before_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->before_image);
            }
            $validated['before_image'] = $request->file('before_image')->store('testimonials', 'public');
        }
        if ($request->hasFile('after_image')) {
            if ($testimonial->after_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->after_image);
            }
            $validated['after_image'] = $request->file('after_image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $testimonial = \App\Models\CustomerTestimonial::findOrFail($id);
        if ($testimonial->before_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->before_image);
        }
        if ($testimonial->after_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->after_image);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
