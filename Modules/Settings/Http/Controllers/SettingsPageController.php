<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 15.10.2018
 * Time: 09:22
 */

namespace Modules\Settings\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Settings\Presenters\SettingsCollectionPresenters;
use Modules\Settings\Service\SettingsPageService;

class SettingsPageController extends Controller
{
    public function index()
    {
        /** @var SettingsPageService $settingsPageService */
        $settingsPageService = app()->make('settingsPage');

        $settings = $settingsPageService->index();

        $presenter = new SettingsCollectionPresenters($settings);
        $presenter->additional(['success' => true]);

        return $presenter;
    }
}