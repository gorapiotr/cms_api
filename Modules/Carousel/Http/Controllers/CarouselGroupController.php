<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 09:57
 */

namespace Modules\Carousel\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Carousel\Model\Carousel;
use Modules\Carousel\Model\CarouselGroup;
use Modules\Carousel\Presenters\CarouselGroupCollectionPresenter;
use Modules\Carousel\Presenters\CarouselsCollectionPresenter;

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
        $presenter->additional(['success' => true]);
        return $presenter;
    }

    public function show(int $carousel_group_id)
    {

        $carouselCollection = CarouselGroup::select(['*'])
             ->findOrFail($carousel_group_id)
             ->carousels;

        $presenter = new CarouselsCollectionPresenter($carouselCollection);
        $presenter->additional(['success' => true]);
        return $presenter;
    }

    public function update(Request $request, int $carousel_group_id)
    {

        $carousels = [];
        foreach ($request->carousels as $carousel) {
            array_push($carousels, $carousel['id']);
        }

        /** @var User $auth_user */
        $auth_user = Auth::id();

        $carouselsCollection = Carousel::select(['*'])
            ->where('user_id', '=', $auth_user)
            ->findOrFail($carousels);

        foreach ($carouselsCollection as $index => $carousel) {
            $status = $carousel->fill([
                'name' => $request->carousels[$index]['name'],
                'alt' => $request->carousels[$index]['alt'],
                'position' => $request->carousels[$index]['position'],
            ])->save();

            $carousel->carouselGroups()->updateExistingPivot($carousel_group_id, ['active' => $request->carousels[$index]['active']]);
        }

        $carouselCollection = CarouselGroup::select(['*'])
            ->findOrFail($carousel_group_id)
            ->carousels;

        $presenter = new CarouselsCollectionPresenter($carouselCollection);
        $presenter->additional(['success' => true]);
        return $presenter;
    }
}