<?php

use Illuminate\Support\Facades\Route;



/*
Telas para ver o funcionamento sem dados
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/sales', function () {
    return view('crud_sales');
});
Route::get('/products', function () {
    return view('crud_products');
});

Route::resources([
    'dashboard' =>  'DashboardController',
    'products'  =>  'ProductController',
    'sales'     =>  'SaleController',
]);
