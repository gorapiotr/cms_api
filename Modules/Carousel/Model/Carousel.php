<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 09.08.2018
 * Time: 16:18
 */

namespace Modules\Carousel\Model;


use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alt',
        'active',
        'user_id',
        'position'
    ];

    public function carouselGroup()
    {
        return $this->belongsTo(CarouselGroup::class);
    }

}