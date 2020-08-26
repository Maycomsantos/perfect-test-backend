@extends('layout')

@section('content')


<h1>Dashboard de vendas</h1>
<div class='card mt-3'>
    <div class='card-body'>
        <h5 class="card-title mb-5">Tabela de vendas
            <a href="{{ route('sales.create')}}" class='btn btn-secondary float-right btn-sm rounded-pill'><i
                    class='fa fa-plus'></i> Nova venda</a></h5>
        <form>

        <div class="form-row align-items-center">
            <div class="col-sm-6 my-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn  btn-primary" type="submit"
                            style='padding: 14.5px 16px;'>Clientes</button>
                    </div>

                    <x-form.select2 name="clients" :options="$products" id="inlineFormInputName" />

                </div>
            </div>

        <div class="col-md-6 my-1">
            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>

            <form method="GET" action="{{ route('sales.index') }}">
                <div class="input-group mb-3">
                    <input class="form-control date_range" name="search" value="{{ request('search') ?? '' }}"
                        placeholder="Username" />
                    <div class="input-group-append">

                        <button class="btn  btn-primary" type="submit" style='padding: 14.5px 16px;'>
                            <i class="fa fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        </form>
        <div class="col-md-12 table-responsive-sm">
            <table class='table'>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th class="text-center w-15">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->date_sale }}</td>
                    <td>{{ $sale->sale }}</td>
                    <td>
                        <a href="{{ route('sales.edit', $sale->id)}}" class='btn btn-primary'>Editar</a>
                    </td>
                    </td>
                    </tr>

                    @empty
                        <x-no-record-found colspan="10" />
                    @endforelse

                </tbody>
            </table>

            </tr>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <div class="col-md-12 table-responsive-sm">
                <table class='table'>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Ações</th>
                    </tr>
                <tbody>
                    @forelse($sales as $sale)
                        <td>{{ $sale->status }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ $sale->sale }}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sale->id)}}" class='btn btn-primary'>Editar</a>
                        </td>
                    </td>
                    </tr>

                    @empty
                        <x-no-record-found colspan="10" />
                    @endforelse

                </tbody>

                </tr>
            </table>
        </div>

    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href="{{ route('products.create')}}" class='btn btn-secondary float-right btn-sm rounded-pill'><i
                        class='fa fa-plus'></i> Novo produto</a></h5>
            <div class="col-md-12 table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th class="text-center w-15">Ações</th>
                        </tr>
                    </thead>
                <tbody>
                    @forelse($products as $product)
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->money }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id)}}" class='btn btn-primary'>Editar</a>
                        </td>
                        </td>
                        </tr>

                    @empty
                        <x-no-record-found colspan="10" />
                    @endforelse

                </tbody>
            </table>
            </div>
        </div>
    </div>
    @endsection
