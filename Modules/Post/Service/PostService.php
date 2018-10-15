<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 14:58
 */

namespace Modules\Post\Service;

use Illuminate\Support\Facades\Auth;
use Modules\Post\Http\Requests\CreatePostRequest;
use Modules\Post\Model\Post;
use Illuminate\Support\Facades\Storage;


class PostService
{
    public function __construct()
    {
        $this->builder = Post::addSelect('*');
    }

    /**
     * Get Post list with pagination
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return $this->builder
            ->orderBy('created_by', 'desc')
            ->paginate(15);
    }

    public function show(int $postId)
    {
        /** @var Post $post */
        $post = $this->builder->findOrFail($postId);

        return $post;
    }

    public function create(CreatePostRequest $request)
    {
        /** @var Post $post */
        $post = new Post();
        $post->fill($request->toArray());

        if($request->hasFile('main_image_file')) {
            $path = Storage::putFile(
                'public/post', $request->file('main_image_file'));
            $post->main_image = $path;
            $post->main_image_type = 'image';
        }

        $post->created_by = Auth::id();
        $post->updated_by = Auth::id();

        return $post;
    }

}