@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{trans('spares.header')}}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{url('spares/add')}}" class="btn btn-success">{{trans('spares.add')}}</a>
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
                <table id="spares-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{trans('spares.name')}}</th>
                            <th>{{trans('spares.price')}}</th>
                            <th>{{trans('spares.category')}}</th>
                            <th>{{trans('spares.brand')}}</th>
                            <th>{{trans('spares.model')}}</th>
                            <th>{{trans('spares.set')}}</th>
                            <th>{{trans('spares.year')}}</th>
                            <th>{{trans('spares.transmission')}}</th>
                            <th>{{trans('spares.fuel')}}</th>
                            <th>{{trans('spares.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($spares as $spare)
                        <tr>
                            <td><a href="{{url('spares/edit/' . $spare->id)}}">{{$spare->name}}</a></td>
                            <td>{{$spare->price}}</td>
                            <td>{{$spare->category->name}}</td>
                            <td>{{$spare->brand->name}}</td>
                            <td>{{$spare->model}}</td>
                            <td>{{$spare->set}}</td>
                            <td>{{$spare->year}}</td>
                            <td>{{$spare->transmission->type}}</td>
                            <td>{{$spare->fuel->type}}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-danger delete">{{trans('spares.delete')}}</a>
                                <form method="post" action="{{url('spares/delete/' . $spare->id)}}">
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
        $('#spares-table').DataTable({
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
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": true
            },{
                "orderable": false
            }]
        });

        $('.delete').on('click', function(e){
            e.preventDefault();
            if(confirm('{!!trans('spares.confirm')!!}')){
                $(e.target).parent().find('form').submit();
            }
        });
    });
</script>
@endsection