<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DietProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = \App\Models\DietProgram::orderBy('display_order')->get();
        return view('admin.diet-programs.index', compact('programs'));
    }

    public function create()
    {
        $program = new \App\Models\DietProgram();
        return view('admin.diet-programs.form', compact('program'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:diet_programs,slug|max:255',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('diet-programs', 'public');
        }

        \App\Models\DietProgram::create($validated);
        return redirect()->route('admin.diet-programs.index')->with('success', 'Program Diet berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $program = \App\Models\DietProgram::findOrFail($id);
        return view('admin.diet-programs.form', compact('program'));
    }

    public function update(Request $request, string $id)
    {
        $program = \App\Models\DietProgram::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:diet_programs,slug,' . $id,
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($program->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($program->image);
            }
            $validated['image'] = $request->file('image')->store('diet-programs', 'public');
        }

        $program->update($validated);
        return redirect()->route('admin.diet-programs.index')->with('success', 'Program Diet berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $program = \App\Models\DietProgram::findOrFail($id);
        if ($program->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($program->image);
        }
        $program->delete();
        return redirect()->route('admin.diet-programs.index')->with('success', 'Program Diet berhasil dihapus.');
    }
}
