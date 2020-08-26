<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Models\{Sale,Product};

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::search()->paginate(10);

        return view('dashboard',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud_sales',[
            'products'  =>  Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        Sale::create($request->all());

        notify()->success('Venda cadastrada com sucesso');

        return redirect('dashboard');
    }


    public function edit(Sale $sale)
    {
        return view('crud_sales',[
            'sale'      =>  $sale,
            'products'  =>  Product::all(),
        ]);
    }

    public function update(SaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());

        notify()->success('Venda atualizada com sucesso');

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();

        notify()->success('Venda deletada com sucesso');

        return back();

    }
}
