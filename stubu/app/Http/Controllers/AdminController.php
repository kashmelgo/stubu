<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin/admindashboard');
    }

    // function getUsers(){
    //     $users = User::all();

    // }
}
