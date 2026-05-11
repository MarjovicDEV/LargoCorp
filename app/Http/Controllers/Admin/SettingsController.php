<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
    public function show()
    {
        $settings = [
            'store_name' => Setting::get('store_name', 'LargoCorp'),
            'store_url' => Setting::get('store_url', 'http://largocorp.test'),
            'admin_email' => Setting::get('admin_email', 'marjovicalejado123@gmail.com'),
            'smtp_host' => Setting::get('smtp_host', ''),
            'smtp_port' => Setting::get('smtp_port', ''),
            'smtp_username' => Setting::get('smtp_username', ''),
            'smtp_password' => Setting::get('smtp_password', ''),
            'from_address' => Setting::get('from_address', 'noreply@largocorp.test'),
            'from_name' => Setting::get('from_name', 'LargoCorp'),
            'default_language' => Setting::get('default_language', 'en'),
            'default_currency' => Setting::get('default_currency', 'USD'),
        ];

        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'store_url' => 'required|url',
            'admin_email' => 'required|email',
            'smtp_host' => 'nullable|string|max:255',
            'smtp_port' => 'nullable|integer',
            'smtp_username' => 'nullable|string|max:255',
            'smtp_password' => 'nullable|string|max:255',
            'from_address' => 'required|email',
            'from_name' => 'required|string|max:255',
            'default_language' => 'required|string|max:10',
            'default_currency' => 'required|string|max:10',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('settings.show')->with('success', 'Settings updated successfully.');
    }
}
