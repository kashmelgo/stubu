<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeFeedController extends Controller
{
    public function index(){

        $threads = DB::select('select * from threads');
        return view('homepage/homefeed', ['threads' => $threads]);
    }

    public function create()
    {
        return view('thread.create');
    }

    public function show(Thread $thread)
    {
        return view('thread.single',compact('thread'));
    }

}
