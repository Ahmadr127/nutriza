<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = \App\Models\SiteSetting::pluck('value', 'key')->toArray();
        return view('admin.site-settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('settings', 'public');
                $value = $path; // save path as value
            }

            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Pengaturan global berhasil diperbarui.');
    }
}
