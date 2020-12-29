<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{

    function __construct(){
        /* Before reaching Thread Page, User must Pass the Authentication Page*/
        return $this->middleware('auth')->except('index');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads=Thread::paginate(15);
        return view('thread.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $this->validate($request,[
            'subject' => 'required|min:10',
            'type' => 'required',
            'body' => 'required'
        ]);

        //store

        $thread = auth()->user()->threads()->create($request->all());
            

        //redirect
        return view('thread.single',compact('thread'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('thread.single',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit',compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'subject' => 'required|min:10',
            'type' => 'required',
            'body' => 'required'
        ]);

        if(auth()->user()->id != $thread->user_id){
            abort(401,'Unauthorized Access!');
        }

        $thread->update($request->all());

        return redirect()->route('thread.show',$thread->id)->withMessage('Thread Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        if(auth()->user()->id != $thread->user_id){
            abort(401,'Unauthorized Access!');
        }

        $thread->delete();

        return redirect()->route('thread.index')->withMessage('Thread Deleted Successfully!');
    }

    public function deletenotif(Thread $thread, $id)
    {

        $userUnreadNotification = auth()->user()
                                    ->unreadNotifications
                                    ->where('id', $id)
                                    ->first();

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
        return view('thread.single',compact('thread'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $posts = DB::table('threads')->where('subject','like','%'.$search.'%')->paginate(5);
        return view('thread.index', ['posts' => $posts]);
    }

}
