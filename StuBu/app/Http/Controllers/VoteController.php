<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $vote = new Vote();
        $vote->user_id = auth()->user()->id;
        $vote->comment_id = $request->comment_id;
        $vote->vote = $request->vote;
        $vote->save();
        return response()->json([
            'bool'=>true
        ]);
    }
}
