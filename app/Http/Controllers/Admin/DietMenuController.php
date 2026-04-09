<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DietMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = \App\Models\DietMenu::latest()->get();
        return view('admin.diet-menus.index', compact('menus'));
    }

    public function create()
    {
        $menu = new \App\Models\DietMenu();
        return view('admin.diet-menus.form', compact('menu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required',
            'meal_type' => 'required',
            'food_name' => 'required',
            'calories' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('diet-menus', 'public');
        }

        \App\Models\DietMenu::create($validated);
        return redirect()->route('admin.diet-menus.index')->with('success', 'Diet Menu berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $menu = \App\Models\DietMenu::findOrFail($id);
        return view('admin.diet-menus.form', compact('menu'));
    }

    public function update(Request $request, string $id)
    {
        $menu = \App\Models\DietMenu::findOrFail($id);
        
        $validated = $request->validate([
            'day' => 'required',
            'meal_type' => 'required',
            'food_name' => 'required',
            'calories' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($menu->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($menu->image);
            }
            $validated['image'] = $request->file('image')->store('diet-menus', 'public');
        }

        $menu->update($validated);
        return redirect()->route('admin.diet-menus.index')->with('success', 'Diet Menu berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $menu = \App\Models\DietMenu::findOrFail($id);
        if ($menu->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($menu->image);
        }
        $menu->delete();
        return redirect()->route('admin.diet-menus.index')->with('success', 'Diet Menu berhasil dihapus.');
    }
}
