<?php

namespace Modules\Carousel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Carousel\Model\Carousel;
use Modules\Carousel\Model\CarouselGroup;
use Modules\Carousel\Presenters\CarouselPresenter;
use Modules\Carousel\Presenters\CarouselsCollectionPresenter;
use Modules\User\Model\User;

class CarouselController extends Controller
{
    /** TODO
     * Add softdelete and request vaildation for CRUD.
     */



    /**
     * @return CarouselsCollectionPresenter
     */
    public function index()
    {
        /** TODO
         * Add pagination.
         */

        /** @var  $carouselCollection */
        $carouselCollection = Carousel::all();
        $presenter = new CarouselsCollectionPresenter($carouselCollection);
        $presenter->additional(['success' => true]);
        return $presenter;
    }

    /**
     * @param int $carousel_id
     * @return CarouselPresenter
     */
    public function show(int $carousel_id)
    {
        /** TODO
         *  Return message, not stack.
         */

        /** @var  $carousel */
        $carousel = Carousel::findOrFail($carousel_id);

        $presenter = new CarouselPresenter($carousel);
        $presenter->additional(['success' => true]);
        return $presenter;
    }

    /**
     * @param Request $request
     * @return CarouselPresenter
     */
    public function store(Request $request)
    {
        /** todo
         * add to pivot table!
         */

        dd($request);
        /** @var User $auth_user */
        $auth_user = Auth::id();

        if(  $carousel = Carousel::create([
            'user_id' => $auth_user,
            'name' => $request->name,
            'alt' => $request->alt,
            'position' => $request->position
        ])
        ) {
            $presenter = new CarouselPresenter($carousel);
            $presenter->additional(['success' => true]);
        }else{
            $presenter = new CarouselPresenter($request->toArray());
            $presenter->additional(['success' => false]);
        }
        return $presenter;
    }

    /**
     * @param Request $request
     * @param int $carousel_id
     * @return CarouselPresenter
     */
    public function update(Request $request, int $carousel_id)
    {
        /** @var User $auth_user */
        $auth_user = Auth::id();

        $carousel = Carousel::select(['*'])
            ->where('user_id', '=', $auth_user)
            ->findOrFail($carousel_id);

        $status = $carousel->fill([
            'name' => $request->name,
            'alt' => $request->alt,
            'position' => $request->position
        ])->save();


        $presenter = new CarouselPresenter($carousel);
        $presenter->additional(['success' => $status]);

        return $presenter;
    }
}
