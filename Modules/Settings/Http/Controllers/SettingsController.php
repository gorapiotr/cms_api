<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Settings\Model\Settings;
use Modules\Settings\Presenters\SettingsCollectionPresenters;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();

        $presenter = new SettingsCollectionPresenters($settings);

        return $presenter;
    }
}
