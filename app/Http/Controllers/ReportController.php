<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\servant;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return view("reports.index");
    }

    public function generate(Request $request)
    {
        // validation
        // get date
        $startdate = date("Y-m-d H:i:s", strtotime($request->from. "00:00:00"));
        $enddate = date("Y-m-d H:i:s", strtotime($request->to. "23:59:59"));

        $sales = Sale::whereBetween("created_at", [$startdate, $enddate])
            ->where("payment_status", "paid")->get();
        $servents = Servant::all();

        $total = $sales->sum("total_received");
        return view("reports.index", compact(
            "startdate",
            "enddate",
            "sales",
            "total",
            "servents",
        ));
    }

    public function export(Request $request)
    {
        return Excel::download(new SalesExport($request->from, $request->to), 'reports.xlsx');
    }
}
