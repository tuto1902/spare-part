@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{trans('spares.header')}}</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{trans('spares.edit')}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" action="{{url('spares/edit/' . $spare->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                <label>{{trans('categories.name')}} *</label>
                                <input class="form-control" name="name" value="{{$spare->name}}">
                                @if($errors->has('name'))
                                <p class="help-block">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                                <label>{{trans('spares.price')}} *</label>
                                <input type="number" class="form-control" name="price" value="{{$spare->price}}">
                                @if($errors->has('price'))
                                <p class="help-block">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                                <label>{{trans('spares.category')}}</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $spare->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                <p class="help-block">{{$errors->first('category_id')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('brand_id') ? 'has-error' : ''}}">
                                <label>{{trans('spares.brand')}} *</label>
                                <select class="form-control" name="brand_id">
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$brand->id == $spare->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('brand_id'))
                                <p class="help-block">{{$errors->first('brand_id')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('model') ? 'has-error' : ''}}">
                                <label>{{trans('spares.model')}} *</label>
                                <input class="form-control" name="model" value="{{$spare->model}}">
                                @if($errors->has('model'))
                                <p class="help-block">{{$errors->first('model')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('set') ? 'has-error' : ''}}">
                                <label>{{trans('spares.set')}}</label>
                                <input class="form-control" name="set" value="{{$spare->set}}">
                                @if($errors->has('set'))
                                <p class="help-block">{{$errors->first('set')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('year') ? 'has-error' : ''}}">
                                <label>{{trans('spares.year')}}</label>
                                <input class="form-control" name="year" value="{{$spare->year}}">
                                @if($errors->has('year'))
                                <p class="help-block">{{$errors->first('year')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('transmission_id') ? 'has-error' : ''}}">
                                <label>{{trans('spares.transmission')}}</label>
                                <select class="form-control" name="transmission_id">
                                    @foreach($transmissions as $transmission)
                                    <option value="{{$transmission->id}}" {{$transmission->id == $spare->transmission_id ? 'selected' : ''}}>{{$transmission->type}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                <p class="help-block">{{$errors->first('category_id')}}</p>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('fuel_id') ? 'has-error' : ''}}">
                                <label>{{trans('spares.fuel')}}</label>
                                <select class="form-control" name="fuel_id">
                                    @foreach($fuels as $fuel)
                                    <option value="{{$fuel->id}}" {{$fuel->id == $spare->fuel_id ? 'selected' : ''}}>{{$fuel->type}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('fuel_id'))
                                <p class="help-block">{{$errors->first('fuel_id')}}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">{{trans('spares.save')}}</button>
                            <button type="reset" class="btn btn-default">{{trans('spares.cancel')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection