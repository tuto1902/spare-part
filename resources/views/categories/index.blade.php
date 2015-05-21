@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{trans('categories.header')}}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{url('categories/add')}}" class="btn btn-success">{{trans('categories.add')}}</a>
            </div>
            <div class="panel-body">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('message')}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('error')}}
                </div>
                @endif
                <table id="categories-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{trans('categories.name')}}</th>
                            <th>{{trans('categories.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td><a href="{{url('categories/edit/' . $category->id)}}">{{$category->name}}</a></td>
                            <td>
                                <a href="#" class="btn btn-xs btn-danger delete">{{trans('categories.delete')}}</a>
                                <form method="post" action="{{url('categories/delete/' . $category->id)}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#categories-table').DataTable({
            responsive: true,
            language:{
                "emptyTable":     "No hay datos disponibles",
                "info":           "Mostrando _START_ a _END_ de _TOTAL_",
                "infoEmpty":      "Mostrando 0 a 0 de 0",
                "infoFiltered":   "(filtrado de _MAX_ en total)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Mostrar _MENU_ registros",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron resultados",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": ordenar de forma ascendente",
                    "sortDescending": ": ordenar de forma descendente"
                }
            },
            "columns": [{
                "orderable": true
            }, {
                "orderable": false
            }]
        });

        $('.delete').on('click', function(e){
            e.preventDefault();
            if(confirm('{!!trans('categories.confirm')!!}')){
                $(e.target).parent().find('form').submit();
            }
        });
    });
</script>
@endsection