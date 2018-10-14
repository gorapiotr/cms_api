<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Post\Http\Requests\UpdatePostRequest;
use Modules\Post\Model\Post;
use Modules\Post\Presenters\PostCollectionPresenter;
use Modules\Post\Presenters\PostPresenter;
use Modules\Post\Service\PostService;
use Illuminate\Support\Facades\Storage;

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

    public function update(UpdatePostRequest $request, int $post_id)
    {

        $post = Post::findOrFail($post_id)
            ->first();

        if($request->hasFile('main_image_file')) {
            $path = Storage::putFile(
                'public/post', $request->file('main_image_file'));
            $post->main_image = $path;
            $post->main_image_type = 'image';
        }

        $post->fill($request->all());
        $post->save();

        $presenter = new PostPresenter($post);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

}
