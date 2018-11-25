<?php

namespace Modules\Slider\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\Slider\Model\Slider;
use Modules\Slider\Http\Requests\UpdateSliderRequest;
use Modules\Slider\Presenters\SliderCollectionPresenters;
use Modules\Slider\Presenters\SliderPresenter;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slider::all();
        $presenter = new SliderCollectionPresenters($slides);

        return $presenter;
    }

    public function update(UpdateSliderRequest $request)
    {

        $slide = new Slider;

        $slide->fill([
            'file_name' => $request->file_name,
            'image_url' => $request->image_url,
            'updated_by' => Auth::id(),
            'created_by' => Auth::id(),
        ])->save();

        $presenter = new SliderPresenter($slide);

        return $presenter;
    }
}
