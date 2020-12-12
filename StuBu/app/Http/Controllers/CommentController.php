<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread){

        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $thread->comments()->save($comment);

        auth()->user()->notify(new RepliedToThread());

        return back()->withMessage('Comment Added Successfully!');

    }

    public function addReplyComment(Request $request, Comment $comment){

        $this->validate($request,[
            'body'=>'required'
        ]);

        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;

        $comment->comments()->save($reply);

        return back()->withMessage('Reply Added Successfully!');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id!=auth()->user()->id){
            abort(401);
        }
        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->update($request->all());

        return back()->withMessage('Comment Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id!=auth()->user()->id){
            abort(401);
        }
        $comment->delete();

        return back()->withMessage('Comment Deleted Successfully');
    }
}
