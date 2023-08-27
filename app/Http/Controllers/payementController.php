<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Servant;

class payementController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tables = Table::paginate(4);
        $menus = Menu::paginate(4);
        $servants = Servant::all();
        return view("gestion.payements.index",
            compact("categories", "tables", "menus", "servants")
        );
    }

}
