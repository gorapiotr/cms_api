<?php

namespace Modules\Settings\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Settings\Http\Requests\UpdateSettingRequest;
use Modules\Settings\Model\Settings;
use Modules\Settings\Presenters\SettingsCollectionPresenters;
use Modules\Settings\Presenters\SettingsPresenter;
use Illuminate\Support\Facades\Storage;


class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        $presenter = new SettingsCollectionPresenters($settings);

        return $presenter;
    }

    public function update(UpdateSettingRequest $request, int $setting_id)
    {

        $setting = Settings::where('key', '=', $request->key)
                ->first();

        $setting->fill([
            'value' => $request->value,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ])->save();

        if($request->hasFile('file')) {
            $path = Storage::putFile(
                'public/settings', $request->file('file'));
            $setting->value = $path;
            $setting->type = 'image';
            $setting->save();
        }

        $presenter = new SettingsPresenter($setting);

        return $presenter;
    }
}
