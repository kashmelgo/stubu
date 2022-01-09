<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Comment;
use App\Models\Thread;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $report = new Report();

        $report->user_id = auth()->user()->id;

        $report->reasons = json_encode($request->reasons);

        $report->status = "Pending";

        $report->reportable_id = $request->report_id;
        $report->reportable_type = $request->report_type;

        $report->save();

        if($report->reportable_type = "App\Models\Thread"){
            $comment = Comment::FindOrFail($report->reportable_id);
            $comment->status = "Pending";
            $comment->save();
        }else{
            $thread = Thread::FindOrFail($report->reportable_id);
            $thread->status = "Pending";
            $thread->save();
        }
        

        echo json_encode($report);
    }

    public function getReports(){
        //$comments = Comment::paginate(15);

        $threads = Thread::where('status', '=', "Pending")->get();
        $comments = Comment::where('status', '=', "Pending")->get();

        return view('admin/adminreports', ['threads' => $threads , 'comments' => $comments]);
    }
}