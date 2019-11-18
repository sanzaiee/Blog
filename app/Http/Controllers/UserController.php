<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all= User::all();
        $admin = User::where('user_type',1)->get();
        $client = User::where('user_type',2)->get();
    return view('backend.user.index',compact('admin','all','client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function approval($id){
        if($id >0 && Auth::user()->user_type == 1){

             $data= User::findOrFail($id);
             $data->approve = !$data->approve;
             $data->save();
            return back();
        }
    }


    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make('password'),
            'user_type'=>1,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'approve'=>1,
        ]);

        return redirect()->route('user.index')->with('success', ' category Updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::findOrFail($id);
         return view('backend.user.edit',compact('user'));
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
        User::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make('password'),
            'user_type'=>1,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'approve'=>1,
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index');

    }
}
