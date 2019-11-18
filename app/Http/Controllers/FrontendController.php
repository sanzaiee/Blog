<?php

namespace App\Http\Controllers;

use App\Model\Blog\Blog;
use App\Model\Category\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function forData(){

     $category=  Category::all();

$blogs = Blog::all()->random(3);
        return view('welcome',compact('category','blogs'));
    }


    public function forCategory($id){
        $category=  Category::all();
         $blog =Blog::where('category_id',$id)->get();
        return view('frontend.blogCategory',compact('blog','category'));
    }

    public function forAbout(){
        $category=  Category::all();


        return view('frontend.about',compact('category'));
    }

    public function StoreClient(Request $request)
    {
         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'phone' => $request['phone'],
            'user_type' => 3,
            'status' => 1,
            'approve' => 0,
        ]);
        return redirect('/');
    }
}
