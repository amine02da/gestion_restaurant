<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("auth")
    ->group(function() {
        Route::resource("category", CategoryController::class);
        Route::resource("table", TableController::class);
        Route::resource("server", ServantController::class);
        Route::resource("menu", MenuController::class);
        Route::resource("payement", payementController::class);
        Route::resource("add_payement",SaleController::class);
        Route::get("ticket/{id}",[SaleController::class, "ticket"])->name("ticket");
        Route::get("reports",[ReportController::class, "index"])->name("reports.index");
        Route::post("reports.generate",[ReportController::class, "generate"])->name("reports.generate");
        Route::post("reports.export",[ReportController::class, "export"])->name("reports.export");
        Route::get('/get-menu-price/{id}', [MenuController::class,"getMenuPrice"])->name('get.menu.price');
});
