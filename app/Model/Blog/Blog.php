<?php

namespace App\Model\Blog;

use App\Model\Category\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{

protected $table = 'blogs';
protected $fillable= ['blog_description', 'blog_short_description', 'blog_title', 'image', 'status', 'user_id', 'category_id'];

use SoftDeletes;

public function user(){
    return $this->belongsTo(User::class,'user_id');
}

public function category(){
    return $this->belongsTo(Category::class,'category_id');
}
}
