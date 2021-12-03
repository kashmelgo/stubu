<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

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

        echo json_encode($report);
    }
}
