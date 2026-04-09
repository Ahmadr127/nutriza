<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FormLead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'program_interest' => 'nullable|string|max:255',
            'message' => 'nullable|string'
        ]);

        FormLead::create($validated);

        return back()->with('success', 'Terima kasih! Pendaftaran berhasil, tim Nutriza akan segera menghubungi Anda.');
    }
}
