<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeFeedController extends Controller
{
    public function index(){

        $threads = DB::select('select subject from threads');
        return view('homepage/homefeed', ['threads' => $threads]);
    }

    

}
