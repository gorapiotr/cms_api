<?php

namespace Modules\Carousel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Carousel\Model\Carousel;
use Modules\Carousel\Presenters\CarouselPresenter;
use Modules\Carousel\Presenters\CarouselsListPresenter;
use Modules\User\Model\User;

class CarouselController extends Controller
{
    /** TODO
     * Add softdelete and request vaildation for CRUD.
     */



    /**
     * @return CarouselsListPresenter
     */
    public function index()
    {
        /** TODO
         * Add pagination.
         */

        /** @var  $carouselCollection */
        $carouselCollection = Carousel::all();
        $presenter = new CarouselsListPresenter($carouselCollection);

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
        $carousel = Carousel::findOrFail($carousel_id)->first();
        $presenter = new CarouselPresenter($carousel);

        return $presenter;
    }

    public function store(Request $request)
    {
        /** @var User $auth_user */
        $auth_user = Auth::id();

        if(  $carousel = Carousel::create([
            'user_id' => $auth_user,
            'name' => $request->name,
            'alt' => $request->alt,
            'active' => $request->active,
            'position' => $request->position
        ]) ) {
            $presenter = new CarouselPresenter($carousel);
            $presenter->additional(['success' => true]);
        }else{
            $presenter = new CarouselPresenter($request->toArray());
            $presenter->additional(['success' => false]);
        }
        return $presenter;
    }

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
            'active' => $request->active,
            'position' => $request->position
        ])->save();

        $presenter = new CarouselPresenter($carousel);
        $presenter->additional(['success' => $status]);

        return $presenter;
    }

}
