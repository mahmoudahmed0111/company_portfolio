<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings', ['only' => ['index']]);
    }

    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }


    public function update(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'required|email',
            'address_ar' => 'required|string|max:255',
            'address_en' => 'required|string|max:255',
            'phone1' => 'required|string|max:20',
            'phone2' => 'required|string|max:20',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the setting by its ID (assuming you're passing the setting as an object to the view)
        $setting = Setting::first();

        // Update the setting fields
        $setting->email = $request->email;
        $setting->phone1 = $request->phone1;
        $setting->phone2 = $request->phone2;

        // Check if a new logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete the old logo from storage if exists
            if ($setting->logo && Storage::exists($setting->logo)) {
                Storage::delete($setting->logo);
            }

            // Store the new logo
            $logoPath = $request->file('logo')->store('settings_logos', 'public');
            $setting->logo = $logoPath;
        }

        // Save the settings
        $setting->save();

        // Update the translations
        $setting->translate('ar')->name = $request->name_ar;
        $setting->translate('ar')->address = $request->address_ar;
        $setting->translate('ar')->description = $request->description_ar;

        $setting->translate('en')->name = $request->name_en;
        $setting->translate('en')->address = $request->address_en;
        $setting->translate('en')->description = $request->description_en;

        // Save the translations
        $setting->save();

        // Redirect back with a success message
        return redirect()->route('settings.index', ['setting' => $setting->id])->with('success', __('translations.settings-updated'));
    }
}
