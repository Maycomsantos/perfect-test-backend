<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Product,Sale};

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'products'  =>  Product::all(),
            'sales'     =>  Sale::all(),
        ]);
    }
}
