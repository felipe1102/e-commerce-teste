@extends('layout.app')

@section('title', 'Vizualizar produto')

@section('content')
    <form class="col-md-12 col-md-offset-2" action="/product/update" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{$product['id']}}" id="product_id">
        <h2>Produtos</h2>
        <div class="row">
            <div class="form-group col-md-4 col-md-offset-2">
                <img src="{{asset('images/productImages/'.$product['image'])}}" width="320" height="205" class="img-thumbnail">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product['name']}}"  placeholder="name">
            </div>
            <div class="form-group col-md-4">
                <label for="price">Site</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$product['price']}}"  placeholder="price">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label for="description">Descrição</label>
                <textarea class="form-control " id="description" name="description" rows="3">{{$product['description']}}</textarea>
            </div>
            <div class="form-group col-md-8">
                <label for="email_retailer">E-mail para detalhes do produto</label>
                <input type="text" class="form-control" id="email_retailer" name="email_retailer" value="{{$product['email_retailer']}}"  placeholder="email">
            </div>
        </div>

        <button type="submit" class="btn btn-default">Salvar</button>
    </form>

@endsection
