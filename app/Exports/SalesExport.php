<?php

namespace App\Exports;

use App\Models\Sale;
use App\Models\Servant;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesExport implements FromView
{
    /**
    * @return view
    */
    private $from;
    private $to;
    private $sales;
    private $total;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->sales = Sale::whereBetween("created_at", [$from, $to])
            ->where("payment_status", "paid")->get();
        $this->total = $this->sales->sum("total_received");

    }

    public function view(): View
    {
        $servents = Servant::all();
        return view('reports.export', [
            "from" => $this->from,
            "to" => $this->to,
            "sales" => $this->sales,
            "total" => $this->total,
            "servents" => $servents
        ]);
    }
}
