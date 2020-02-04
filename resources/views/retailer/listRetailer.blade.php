@extends('layout.app')

@section('title', 'Lista de produtos')

@section('content')
    <script type="text/javascript">
        function ajaxprod(){
            $.ajax({
                type: "GET",
                url: "/retailers",
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.length) {
                        for(var i=0;data.length>i;i++){
                            url = '/retailer/'+data[i].id;
                            urlDelete = '/retailer/delete/'+data[i].id;
                            $('#tableitem').append(
                                '<tr class=" text-center"><td><a href='+url+'>'+data[i].name+'</a></td><td>'+data[i].description+'</td><td>'+data[i].website+'</td></tr>');
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
    <div class="table-responsive">
        <h2>Lista varegista</h2>
        <table id="tableitem" class="table table-striped table-bordered table-hover" style="font-size:12px;">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Web site</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

@endsection
