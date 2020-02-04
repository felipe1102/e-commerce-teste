@extends('layout.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <form class="col-md-12 col-md-offset-2" action="/retailers/register" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}

        <div class="row">
            <h2>Cadastro varegista</h2>
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value=""  placeholder="Nome" required>
            </div>
            <div class="form-group col-md-4">
                <label for="website">Web site</label>
                <input type="text" class="form-control" id="website" name="website" value=""  placeholder="Web site" required>
            </div>

            <div class="form-group col-md-8">
                <label for="description">Descrição</label>
                <textarea class="form-control " id="description" name="description" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="logo">Logo</label>
                <input type='file' id="logo" name="logo" accept="image/*" />
            </div>
        </div>
        <button type="submit" class="btn btn-default">Salvar</button>
    </form>
@endsection
