<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminSettingController extends Controller
{
    /**
     * Display settings
     */
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update general settings
     */
    public function updateGeneral(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_email' => 'required|email',
            'site_phone' => 'required|string',
            'site_address' => 'required|string',
            'site_description' => 'required|string',
            'currency' => 'required|string|max:3',
            'currency_symbol' => 'required|string|max:5',
            'maintenance_mode' => 'boolean',
            'google_analytics_id' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    /**
     * Show the form for editing settings
     */
    public function edit(Setting $setting): View
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update a setting
     */
    public function update(Request $request, Setting $setting): RedirectResponse
    {
        $validated = $request->validate([
            'value' => 'required|string',
        ]);

        $setting->update($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully');
    }
}
