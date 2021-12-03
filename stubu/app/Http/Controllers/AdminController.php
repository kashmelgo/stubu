<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin/admindashboard');
    }

    function getUsers(){
        $users = User::paginate(15);

        return view('admin/adminusers', ['users' => $users]);
    }

    function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return redirect('users');
    }

    function searchUsers(Request $request){
        $search = $request->searchusers;
        $users = User::where('name', $search)->orWhere('name', 'like', '%'.$search.'%')->get();
        return view('admin/adminusers', ['users' => $users]);
    }
}
