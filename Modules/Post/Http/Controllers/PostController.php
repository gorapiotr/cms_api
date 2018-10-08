<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Post\Presenters\PostCollectionPresenter;
use Modules\Post\Presenters\PostPresenter;
use Modules\Post\Service\PostService;

class PostController extends Controller
{
    /**
     * @return PostCollectionPresenter
     */
    public function index()
    {
        /** @var PostService $postService */
        $postService = app()->make('post');

        $posts = $postService->index();

        $presenter = new PostCollectionPresenter($posts);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

    public function show(int $postId)
    {
        /** @var PostService $postService */
        $postService = app()->make('post');

        $post = $postService->show($postId);

        $presenter = new PostPresenter($post);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

}
