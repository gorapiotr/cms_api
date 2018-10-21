<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 14.10.2018
 * Time: 19:28
 */

namespace Modules\Post\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Presenters\PostCollectionPresenter;
use Modules\Post\Presenters\PostPresenter;
use Modules\Post\Service\PostPageService;


class PostPageController extends Controller
{
    /**
     * @return PostCollectionPresenter
     */
    public function index()
    {
        /** @var PostPageService $postPageService */
        $postPageService = app()->make('postPage');

        $posts = $postPageService->index();

        $presenter = new PostCollectionPresenter($posts);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

    public function show(string $slug)
    {
        /** @var PostPageService $postPageService */
        $postPageService = app()->make('postPage');

        $post = $postPageService->show($slug);

        $presenter = new PostPresenter($post);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

    public function getCollection(Request $request)
    {

        /** @var PostPageService $postPageService */
        $postPageService = app()->make('postPage');

        $posts = $postPageService->getCollection($request->postIds);


        $presenter = new PostCollectionPresenter($posts);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

}