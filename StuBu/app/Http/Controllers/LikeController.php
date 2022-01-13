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

        $likeCount = $comment->likes()->where("value", "=", 1)->count() - $comment->likes()->where("value" ,"=", -1)->count();
        echo json_encode(array(
            "ret" => $ret,
            "likeCount" => $likeCount
        ));
    }

    public function unLikeIt(Request $request){
        $comment = Comment::findOrFail($request->comment_id);
        $ret = $comment->likeIt(-1);

        $likeCount = $comment->likes()->where("value", "=", 1)->count() - $comment->likes()->where("value" ,"=", -1)->count();

        echo json_encode(array(
            "ret" => $ret,
            "likeCount" => $likeCount
        ));
    }
}
