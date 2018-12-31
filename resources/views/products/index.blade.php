@extends('layouts.app')
<style>
  th{
      font-size: 100%;
  }  
  .wide{
    width: 75%;
    margin: auto;
}


</style>
@section('content')


<div class="wide">
        <div class="row">
        <h1> Страница със складова наличност<h1>
        </div>
    <form action="/search" method="get">
        <div class="row">
            
            <div class="form-group">         
            <input type="search" name="search" class="form-control" placeholder="Име на продукт">
                </div>

                <div class="form-group">
            <input class="form-control" type="text" name='code' placeholder="код(търси само по код) ">
                </div>
            </div>
            <div class="row">
        <div class="form-group">
            <span>
             <select name="category">
                    <option value="">Всички стоки</option>
                    <option value="hranitelni_stoki">Хранителни стоки</option>
                    <option value="kancelarski_materiali">Канцеларски материали</option>
                    <option value="stroitelni_materiali">Строителни материали</option>
             </select>
            </div>

             <div class="input-group mb-3">
              <button type="submit" class="btn btn-primary">Search</button>
              <a class="btn btn-secondary" href="/products/create" >{{ __('Create product') }}</a>
            </div>
        </div>
            </span>
        </form>

        <div class="row">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Наименование на продукт </th>
            <th>Описание на продукт </th>
            <th>Цена на закупуване </th>
            <th>Цена на продаване</th>
            <th>Брой продукти </th>
            <th>Категория</th>
            <th>Код</th>
        </tr>
    </thead>
    <tbody>
       @foreach($products as $product)
       <tr>
           <td>{{$product->name}}</td>
           <td>{{$product->description}}</td>
           <td>{{$product->buy_price}}</td>
           <td>{{$product->sell_price}}</td>
           <td>{{$product->number_of_products}}</td>
           <td>{{$product->category}}</td>
           <td>{{$product->code}}</td>
       <td><a href="/products/{{$product->id}}/edit" class="btn btn-primary">edit</a></td>
       <td>{!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}<td>
       </tr>
       @endforeach
       </tbody>
    </table>
    {{ $products->links() }}
    @endsection

</div>
</div>