<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\UploadFile;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadFile;

    public function index()
    {
        $setting = Setting::first() ? Setting::first() : null;
        return view('pages.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $setting = Setting::first();

        if ($setting) {
            if ($request->file('file')) {
                $request['logo'] = $this->uploadFile(
                    $request->file('file'),
                    'logo',
                    'logo',
                    true,
                    $setting->logo
                );
            }
            $setting->update($request->except('file'));
        } else {
            if ($request->file('file')) {
                $request['logo'] = $this->uploadFile(
                    $request->file('file'),
                    'logo',
                    'logo'
                );
            }
            Setting::create($request->except('file'));
        }

        return redirect()->route('setting.index');
    }
}
