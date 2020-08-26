@extends('layout')

@section('content')
<h1>Adicionar / Editar Produto</h1>
<div class='card'>
    <div class='card-body'>

        <x-form.model route="products" :model="$product ?? null" />

        <div class="form-group">
            <label for="name">Nome do produto *</label>
                <x-form.input name="name" :model="$product ?? null" class="form-control" id="name" placeholder="Nome do Produto" />
                <x-error field="name" />
        </div>


        <div class="form-group">
            <label for="description">Descrição *</label>
                <x-form.textarea name="description" :model="$product ?? null" class="form-control" id="description"
                    placeholder="Descreva o produto" />
                <x-error field="description" />
        </div>

        <div class="form-group">
            <label for="money">Preço *</label>
                <x-form.input name="money" :model="$product ?? null" class="form-control" id="money"
                placeholder="100,00 ou maior" onkeypress="$(this).mask('R$ 9999.990,00')" />
                <x-error field="money" />
        </div>
        <hr>

        <button type="submit" class="btn btn-primary" style="margin-top:10px;">Salvar</button>
        </form>

        <a class="btn btn-light" href="{{ route('dashboard.index') }}">
            <i class="fa fa-undo"></i> Voltar à listagem
        </a>
    </div>
</div>
@endsection
