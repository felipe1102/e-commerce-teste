@extends('layout.app')

@section('title', 'visualizar varegista')

@section('content')
    <form class="col-md-12 col-md-offset-2" action="/retailer/update" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="retailer_id" value="{{$retailer['id']}}" id="product_id">
        <h2>Varegista</h2>
        <div class="row">
            <div class="form-group col-md-4 col-md-offset-2">
                <img src="{{asset('images/retailerImages/'.$retailer['logo'])}}" width="320" height="205" class="img-thumbnail">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$retailer['name']}}"  placeholder="name">
            </div>
            <div class="form-group col-md-4">
                <label for="site">Site</label>
                <input type="text" class="form-control" id="website" name="website" value="{{$retailer['website']}}"  placeholder="site">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label for="description">Descrição</label>
                <textarea class="form-control " id="description" name="description" rows="3">{{$retailer['description']}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <button type="submit" class="btn btn-default">Editar</button>
            </div>
        </div>


        <div class="table-responsive col-md-8">
            <table id="tableitem" class="table table-striped table-bordered table-hover" style="font-size:12px;">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($retailer['Product'] as $p)
                        <tr class=" text-center">
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>


@endsection
