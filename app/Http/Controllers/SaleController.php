<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Servant;
use Illuminate\Http\Request;
// use DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::with("menus", "tables", "servant")->latest()->paginate(4);
        $servents = Servant::all();
        return view("gestion.sales.index", compact("sales", "servents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::beginTransaction();
        // try{
            $new_sale = Sale::create($request->all());
            $new_sale->menus()->sync($request->menu_id);
            $new_sale->tables()->sync($request->table_id);
            return redirect()->route("add_payement.index")->with("success", "payement add with successfully !");
        // DB::commit();
        // }
        // catch(Throwable $e)
        // {
        //     DB::rollBack();
        //     throw $e;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servents = Servant::all();
        $sale = Sale::with("tables", "menus", "servant")->findOrFail($id);
        return view("gestion.sales.edit", compact("sale", "servents"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function ticket($id)
    {
        $sale = Sale::with("tables", "menus", "servant")->findOrFail($id);
        return view("gestion.sales.ticket", compact("sale"));
    }
}
