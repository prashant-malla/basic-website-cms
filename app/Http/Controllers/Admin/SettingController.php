<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()
    {
        $setting = Setting::pluck('value', 'key');

        return view('admin.setting', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');
        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            } else {
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
        session()->flash('success', 'Setting Saved Successfully');

        return back();
    }
}
