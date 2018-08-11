<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 09:57
 */

namespace Modules\Carousel\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Carousel\Model\CarouselGroup;
use Modules\Carousel\Presenters\CarouselGroupCollectionPresenter;

class CarouselGroupController extends Controller
{
    public function index()
    {
        /** TODO
         * Add pagination.
         */

        /** @var  $carouselCollection */
        $carouselCollection = CarouselGroup::all();
        $presenter = new CarouselGroupCollectionPresenter($carouselCollection);

        return $presenter;
    }
}