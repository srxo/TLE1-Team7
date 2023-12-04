<?php

namespace App\Http\Controllers;

// In AgeWarningSettingController.php

use App\Models\AgeWarningSetting;

public function index()
{
    $showWarning = AgeWarningSetting::first()->show_warning;

    return view('age-warning.index', compact('showWarning'));
}

public function toggle()
{
    $setting = AgeWarningSetting::first();
    $setting->update(['show_warning' => !$setting->show_warning]);

    return redirect()->route('age-warning.index');
}

