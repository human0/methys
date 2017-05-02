@extends('create_vehicle')
@section('form-open')
{!! Form::model($vehicle, ['method'=>'PUT' , 'route' => ['vehicle.update', $vehicle->id]]) !!}
        <div class="form-group {{ $errors->has('user_detail_id') ? ' has-error' : '' }}">
            {!! Form::label('user_detail_id', 'Owner') !!}
            {!! Form::select('user_detail_id', $owners, $vehicle->user_detail->id) !!}
        </div>
        <div class="form-group">
            {!! Form::label('manufacturer', 'Manufacturer') !!}
            {!! Form::select('manufacturer', $manufacturers->pluck('name', 'id'), $vehicle->type->manufacturer->id) !!}
        </div>
        <div class="form-group {{ $errors->has('type_id') ? ' has-error' : '' }}">
            {!! Form::label('type_id', 'Type') !!}
            {!! Form::select('type_id', [$vehicle->type->id => $vehicle->type->name]) !!}
        </div>
        <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
            {!! Form::label('year', 'Year') !!}
            {!! Form::number('year') !!}
        </div>
        <div class="form-group {{ $errors->has('color') ? ' has-error' : '' }}">
            {!! Form::label('color', 'Color') !!}
            {!! Form::input('color', 'color') !!}
        </div>
        <div class="form-group {{ $errors->has('mileage') ? ' has-error' : '' }}">
            {!! Form::label('mileage', 'Mileage') !!}
            {!! Form::number('mileage') !!}
        </div>
        {!! Form::submit('Save', ['class'=>'form-control btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection