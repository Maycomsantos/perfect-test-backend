@extends('layout')

@section('content')
<h1>Adicionar / Editar Venda</h1>

<div class='card'>
    <div class='card-body'>

        <x-form.model route="sales" :model="$sale ?? null" />

            <h5>Informações do cliente</h5>

            <hr>

            <br><div class="form-group">
                <label for="name">Nome do cliente *</label>
                    <x-form.input name="name" :model="$sale ?? null" placeholder="Nome do Cliente" class="form-control " id="name" />
                    <x-error field="name" />
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                    <x-form.input name="email" :model="$sale ?? null" placeholder="Email do Cliente" class="form-control" id="email" />
                    <x-error field="email" />
            </div>

            <div class="form-group">
                <label for="cpf">CPF *</label>
                    <x-form.input name="cpf" :model="$sale ?? null" class="form-control" id="cpf" placeholder="000-000.000-00" onkeypress="$(this).mask('000.000.000-00');" />
                    <x-error field="cpf" />
            </div>

            <hr>

            <h5 class='mt-5'>Informações da venda</h5>

            <hr>

            <br><div class="form-group">
                <label for="product">Produto *</label>
                    <x-form.select2 :options="$products" :model="$sale ?? null" name="product_id" id="product" />
                    <x-error field="product_id" />
            </div>

            <div class="form-group">
                <label for="date">Data *</label>
                    <x-form.input name="date_sale" :model="$sale ?? null" class="form-control single_date_picker" id="date" />
                    <x-error field="date_sale" />
            </div>

            <div class="form-group">
                <label for="date">Valor *</label>
                    <x-form.input name="sale" :model="$sale ?? null" placeholder="Valor da Venda" class="form-control" onkeypress="$(this).mask('R$ 9999.990,00')" />
                    <x-error field="sale" />
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade *</label>
                    <x-form.input name="quantity" :model="$sale ?? null" class="form-control" id="quantity" placeholder="1 a 10" />
                    <x-error field="quantity" />
            </div>

            <div class="form-group">
                <label for="discount">Desconto *</label>
                    <x-form.input name="discount" :model="$sale ?? null" class="form-control" id="discount" placeholder="100,00 ou menor" onkeypress="$(this).mask('R$ 9999.990,00')" />
                    <x-error field="discount" />
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" :model="$sale ?? null" id="status" class="form-control">
                    <option selected>Escolha...</option>
                    <option>Aprovado</option>
                    <option>Cancelado</option>
                    <option>Devolvido</option>
                </select>

                <x-error field="status" />
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        <a class="btn btn-light" href="{{ route('dashboard.index') }}">
            <i class="fa fa-undo"></i> Voltar à listagem
        </a>
    </div>
</div>

@endsection

