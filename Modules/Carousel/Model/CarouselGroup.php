<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 09:41
 */

namespace Modules\Carousel\Model;


use Illuminate\Database\Eloquent\Model;

class CarouselGroup extends Model
{
    protected $table = 'carousel_groups';

    public function carousels()
    {
        return $this->hasMany(Carousel::class);
    }

}