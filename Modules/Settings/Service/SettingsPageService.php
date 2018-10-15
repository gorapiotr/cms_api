<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 15.10.2018
 * Time: 09:21
 */

namespace Modules\Settings\Service;

use Modules\Settings\Model\Settings;

class SettingsPageService
{
    public function __construct()
    {
        $this->builder = Settings::addSelect('*');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->builder->get();
    }
}