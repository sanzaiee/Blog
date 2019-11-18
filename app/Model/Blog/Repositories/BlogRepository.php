<?php

namespace App\Model\Blog\Repositories;

use App\Model\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use App\Model\Blog\Blog;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
    protected $model;

    public function __construct(Blog $blog)
    {

        $this->model = $blog;
    }

    public function  createBlog($data, $img)
    {
        $data['image'] = $img;
        $data['user_id'] = Auth::user()->id;

        return $this->model->create($data);
    }
    public function updateBlog($blog_id, array $data, $aut)
    {
        $data['image'] = $aut;
        Blog::find($blog_id)->update($data);
    }

    public function all()
    {

        return Blog::all();
    }

    public function adminBlog(){
        return Blog::where('user_id',Auth::user()->id)->where('status',1)->get();
    }
    public function get($blog_id): Blog
    {
        return Blog::find($blog_id);
    }

    public function deleteblog($blog_id)
    {
        Blog::destroy($blog_id);
    }
}
