<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profileInfo;
use Illuminate\Support\Facades\DB;

class profileInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        
        

        $info = DB::select('select * from profile_infos WHERE {{Auth::user()->id}} == user_id ');

        // return view('home')->with('info',$info);

        return view('profile')->with('info',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id=$request->input('user_id');
        $mobile_number=$request->input('mobile_number');
        $about_me=$request->input('about_me');

        $info= new profileInfo;

        $info->about_me=$about_me;
        $info->mobile_number=$mobile_number;
        $info->user_id=$user_id;

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename= time() . '.' . $extension;
            $file->move('images/profilePic/',$filename);
            $info->image=$filename;
        }else{
            return $request;
            $info->image='';
        }

        $info->save();

        // return view('home',[profileInfoController::class,'index']);

        return back()->withMessage('Edited Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
