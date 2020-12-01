<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeFeedController extends Controller
{
    public function index(){

        $threads = DB::select('select * from threads', [1]);
        
        return view('homepage/homefeed', ['threads' => $threads->subject]);
    }

    

}
