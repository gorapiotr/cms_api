<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 14:58
 */

namespace Modules\Post\Service;

use Modules\Post\Model\Post;

class PostPageService
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
            ->where('public', '=', true)
            ->orderBy('created_by', 'desc')
            ->paginate(6);
    }

    /**
     * @param string $slug
     * @return Post
     */
    public function show(string $slug)
    {
        /**
         * todo
         * return message if post not found.
         *
         */

        /** @var Post $post */
        $post = $this->builder->where('slug', '=', $slug)->first();

        return $post;
    }
}