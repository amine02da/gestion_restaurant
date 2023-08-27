<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(4);
        return view("gestion.menus.index", compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("gestion.menus.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Menu::rules($request->id));

        $request->merge([
            "slug" => Str::slug($request->title)
        ]);
        
        $request_without_image = $request->except("image");

        if($request->hasFile("image"))
        {
            $file = $request->file("image");
            $path = $file->store("uplods", "public");
            $request_without_image["image"] = $path;
        }

        Menu::create($request_without_image);
        return redirect()->route("menu.index")->with("success", "menu add with successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view("gestion.menus.edit", compact("menu", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate(Menu::rules($menu->id));

        $old_image = $menu->image;
        $request_without_image = $request->except("image");

        if($request->hasFile("image"))
        {
            $file = $request->file("image");
            $path = $file->store("uplods", "public");
            $request_without_image["image"] = $path;
        }

        $menu->update($request_without_image);
        if($old_image && isset($request_without_image["image"]))
        {
            Storage::disk("public")->delete($old_image);
        }

        return redirect()->route("menu.index")->with("success", "menu updated with successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        if($menu->image){
            Storage::disk("public")->delete($menu->image);
        }
        return redirect()->route("menu.index")->with("success", "menu deleted with successfully");

    }

    public function getMenuPrice($id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            return response()->json(['price' => $menu->price]);
        } else {
            return response()->json(['error' => 'Menu not found'], 404);
        }
    }


}
