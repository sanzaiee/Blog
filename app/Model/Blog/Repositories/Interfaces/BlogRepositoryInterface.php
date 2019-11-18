<?php

namespace App\Model\Blog\Repositories\Interfaces;

use App\Model\Blog\Blog;

interface BlogRepositoryInterface
{
    public function createBlog($params,$img);
    public function updateBlog($blog_id,array $params,$aut);
    public function deleteBlog($blog_id);
    public function get($blog_id):Blog;
    public function all();
    public function adminBlog();
}
