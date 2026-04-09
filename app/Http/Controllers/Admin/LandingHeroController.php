<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingHeroController extends Controller
{
    public function index()
    {
        $hero = \App\Models\LandingHero::first() ?: new \App\Models\LandingHero();
        return view('admin.landing-hero.index', compact('hero'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $hero = \App\Models\LandingHero::first();

        if ($request->hasFile('image')) {
            if ($hero && $hero->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($hero->image);
            }
            $validated['image'] = $request->file('image')->store('hero', 'public');
        }

        if ($hero) {
            $hero->update($validated);
        } else {
            \App\Models\LandingHero::create($validated);
        }

        return redirect()->back()->with('success', 'Hero Section berhasil diperbarui.');
    }
}
