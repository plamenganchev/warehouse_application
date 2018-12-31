@extends('layouts.app')
<style>
.wide{
    width: 30%;
    margin: auto;
}
</style>
@section('content')
<div class="wide">
    <h1>Edit Product</h1>
    {!! Form::open(['action' => ['ProductsController@update',$product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name of Product: ')}}
            {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description: ')}}
            {{Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('buy_price', 'Buy price: ')}}
            {{Form::text('buy_price', $product->buy_price, ['class' => 'form-control', 'placeholder' => 'buy price'])}}
        </div>
        <div class="form-group">
            {{Form::label('sell_price', 'Sell price: ')}}
            {{Form::text('sell_price', $product->sell_price, ['class' => 'form-control', 'placeholder' => 'sell price'])}}
        </div>
        <div class="form-group">
            {{Form::label('number_of_products', 'Number of products: ')}}
            {{Form::text('number_of_products', $product->number_of_products, ['class' => 'form-control', 'placeholder' => 'number_of_products'])}}
        </div>
        <div class="form-group">
        <select name="category">
                <option value="hranitelni_stoki">Хранителни стоки</option>
                <option value="kancelarski_materiali">Канцеларски материали</option>
                <option value="stroitelni_materiali">Строителни материали</option>
              </select>
            </div>
        <div class="form-group">
            {{Form::hidden('_method','PUT')}}
            {{Form::label('code', 'Code: ')}}
            {{Form::text('code', $product->code, ['class' => 'form-control', 'placeholder' => 'Code'])}}
        </div>
        {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection

