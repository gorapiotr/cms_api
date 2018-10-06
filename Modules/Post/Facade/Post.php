<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 15:00
 */

namespace Modules\Post\Facade;


use Illuminate\Support\Facades\Facade;

class Post extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'post';
    }
}
