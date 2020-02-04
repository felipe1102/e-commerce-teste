@extends('layout.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <script>
        $(document).ready(function () {
            $('#retailer').on('keyup',function() {
                var query = $(this).val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    type:"GET",
                    data:{'country':query},
                    success:function (data) {
                        console.log(data);
                        $('#retailer_list').html(data);
                    }
                })
            });

            $(document).on('click', 'li', function(){
                $('#retailer_id').val($(this).attr('id'));
                $('#retailer').val($(this).text());
                $('#retailer_list').html("");
            });
        });
    </script>
    <form class="col-md-12 col-md-offset-2" action="/product/register" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="retailer_id" id="retailer_id">
        <h2>Cadastro Produtos</h2>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value=""  placeholder="Nome" required>
            </div>
            <div class="form-group col-md-4">
                <label for="price">Preço</label>
                <input type="text" class="form-control" id="price" name="price" value=""  placeholder="Preço" required>
            </div>
            <div class="form-group col-md-8">
                <label for="retailer">Varegista</label>
                <input type="text" class="form-control" id="retailer" value=""  placeholder="Varegista" required>
                <div id="retailer_list"></div>
            </div>

            <div class="form-group col-md-8">
                <label for="description">Descrição</label>
                <textarea class="form-control " id="description" name="description" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Foto</label>
                <input type='file' id="image" name="image" accept="image/*" />

            </div>
        </div>
        <button type="submit" class="btn btn-default">Salvar</button>
    </form>

@endsection
