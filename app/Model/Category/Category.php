<?php

namespace App\Model\Category;

use App\Model\Blog\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table= 'categories';

protected $fillable= ['category_name','category_description','status'];

use SoftDeletes;

public function blog()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }


}
