@extends('layout.app')

@section('title', 'Lista de produtos')

@section('content')
    <script type="text/javascript">
        function ajaxprod(){
             $.ajax({
                 type: "GET",
                 url: "/products",
                 success: function(data) {
                     data = JSON.parse(data);
                     if (data.length) {
                         for(var i=0;data.length>i;i++){
                             url = '/retailer/'+data[i].retailer.id;
                             urlProduct = '/product/'+data[i].id;
                             urlDelete = '/product/delete/'+data[i].id;
                             $('#tableitem').append(
                                 '<tr class=" text-center"><td><a href='+urlProduct+'>'+data[i].name+'</a></td><td>'+data[i].price+'</td><td><a href='+url+'>'+data[i].retailer.name+'</a></td><td>'+data[i].description+'</td><td><a href='+urlDelete+'>deletar</a></td></tr>');
                         }
                     }else{
                         $('#tableitem').append(
                             '<tr class=" text-center"><td colspan="4"> Nenhuma informação encontrada </td><tr>');
                     }
                 }
             });
        }

        $(document).ready(function() {
            ajaxprod();
        } );
    </script>
    <h2>Lista Produtos</h2>
    <div class="table-responsive">
        <table id="tableitem" class="table table-striped table-bordered table-hover" style="font-size:12px;">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Varegista</th>
                <th>Descrição</th>
                <th>Ação</th>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

@endsection
