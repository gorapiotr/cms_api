<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 14:58
 */

namespace Modules\Post\Service;

use Modules\Post\Model\Post;

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
        return $this->builder->paginate(15);
    }
}