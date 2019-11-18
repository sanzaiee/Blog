<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use App\Model\Blog\Blog;
use App\Model\Category\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return      \Illuminate\Http\Response
     */
    private $blogRepo;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepo = $blogRepository;
    }
    public function index()
    {
        if (Auth::user()->user_type==0) {
            $data =  $this->blogRepo->all();

        } elseif(Auth::user()->user_type==1) {
            $data =  $this->blogRepo->adminBlog();

        }

        return view('backend.blog.index')->with('data',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('backend.blog.create',compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->hasFile('image'));
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            if (!(
                (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'png') == 0) || (strcasecmp($extension, 'gif') == 0))) {
                return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
            }
            $file = $request->file('image');
            $destinationPath = public_path('files/blog');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }
        $blog = new Blog();
        $blog->image = $fileNameToStore;

        $blog = $this->blogRepo->createBlog($request->except('_method', '_token'), $blog->image);

        return redirect()->route('blog.index')->with('success', ' file Added Successfull.');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogRepo->get($id);
        return view('backend.blog.show',compact('blog'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogRepo->get($id);
        $category= Category::where('status',1)->get();
        return view('backend.blog.edit',compact('blog','category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            if ($request->hasFile('image')) {
                $blog = Blog::find($id);
                $blogimage = public_path('files/blog/' . $blog->image);
                File::delete($blogimage);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = time() . '.' . $extension;
                if (!(
                    (strcasecmp($extension, 'jpg') == 0) || (strcasecmp($extension, 'jpeg') == 0) || (strcasecmp($extension, 'png') == 0))) {
                    return redirect()->back()->withInput($request->input())->with('error', 'Please select valid file');
                }
                $file = $request->file('image');
                $destinationPath = public_path('files/blog');
                $file->move($destinationPath, $fileNameToStore);
            } else {
                               $fileNameToStore = Blog::find($id)->image;
            }
            $blog = new Blog();
            $blog->image = $fileNameToStore;
            $blog =   $this->blogRepo->updateblog($id, $request->except('_method', '_token'), $blog->image);
            return redirect()->route('blog.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogRepo->deleteBlog($id);

        return Redirect::back();
    }
}
