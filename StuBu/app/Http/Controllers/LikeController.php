<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //

    public function likeIt(Request $request){
        $comment = Comment::findOrFail($request->comment_id);
        $ret = $comment->likeIt(1);
        echo json_encode($ret);
    }

    public function unLikeIt(Request $request){
        $comment = Comment::findOrFail($request->comment_id);
        $ret = $comment->likeIt(-1);
        echo json_encode($ret);
    }
}
