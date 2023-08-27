<?php

namespace App\Http\Controllers;

use App\Models\Servant;
use Illuminate\Http\Request;

class ServantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Servant::paginate(4);
        return view("gestion.serveurs.index", compact("servers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("gestion.serveurs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Servant::rules());

        Servant::create($request->all());
        return redirect()->route("server.index")->with("success", "server add with success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function show(Servant $servant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servant = Servant::findOrFail($id);
        return view("gestion.serveurs.edit", compact("servant"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(Servant::rules());

        $servant = Servant::findOrFail($id);
        $servant->update($request->all());
        return redirect()->route("server.index")->with("success", "server updated with success");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servant = Servant::findOrFail($id);
        $servant->delete();
        return redirect()->route("server.index")->with("success", "server deleted with success");
    }
}
