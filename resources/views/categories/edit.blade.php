@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{trans('categories.header')}}</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{trans('categories.edit')}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" action="{{url('categories/edit/' . $category->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                <label>{{trans('categories.name')}}</label>
                                <input class="form-control" name="name" value="{{$category->name}}">
                                @if($errors->has('name'))
                                <p class="help-block">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">{{trans('categories.save')}}</button>
                            <button type="reset" class="btn btn-default">{{trans('categories.cancel')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection