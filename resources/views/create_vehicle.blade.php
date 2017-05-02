@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row"> 
    <h4> New Owner </h4>
    {!! Form::open(['url' => 'userdetail', 'class'=>'form-inline']) !!}
        <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
            {!! Form::label('firstname', 'First name', ['class'=>'sr-only']) !!}
            {!! Form::text('firstname', NULL, ['placeholder'=>'First name']) !!}
        </div>
        <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}" >
            {!! Form::label('lastname', 'Last name', ['class'=>'sr-only']) !!}
            {!! Form::text('lastname', NULL, ['placeholder'=>'Last name']) !!}
        </div>
        <div class="form-group {{ $errors->has('number') ? ' has-error' : '' }}">
            {!! Form::label('number', 'Number', ['class'=>'sr-only']) !!}
            {!! Form::text('number', NULL, ['placeholder'=>'Number']) !!}
        </div>
        {!! Form::submit('Add', ['class'=>'form-control btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    <div class="row">   
    <h4>New Type</h4>
    {!! Form::open(['url' => URL('type'), 'class'=>'form-inline']) !!}
        <div class="form-group {{ $errors->has('manufacturer_name') ? ' has-error' : '' }}">
            {!! Form::label('manufacturer_name', 'Manufacture', ['class'=>'sr-only']) !!}
            {!! Form::text('manufacturer_name', NULL, ['placeholder'=>'Manufacturer']) !!}
        </div>
        <div class="form-group {{ $errors->has('type_name') ? ' has-error' : '' }}">
            {!! Form::label('type_name', 'Type', ['class'=>'sr-only']) !!}
            {!! Form::text('type_name', NULL, ['placeholder'=>'Type']) !!}
        </div>
        {!! Form::submit('Add', ['class'=>'form-control btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    <div class="row">
    <h4>New Vihecle</h4>
    @section('form-open')
    {!! Form::open(['url' => URL('vehicle')]) !!}
        <div class="form-group {{ $errors->has('user_detail_id') ? ' has-error' : '' }}">
            {!! Form::label('user_detail_id', 'Owner') !!}
            {!! Form::select('user_detail_id', $owners) !!}
        </div>
        <div class="form-group {{ $errors->has('manufacturer') ? ' has-error' : '' }}">
            {!! Form::label('manufacturer', 'Manufacturer') !!}
            {!! Form::select('manufacturer', $manufacturers->pluck('name', 'id')) !!}
        </div>
        <div class="form-group {{ $errors->has('type_id') ? ' has-error' : '' }}">
            {!! Form::label('type_id', 'Type') !!}
            {!! Form::select('type_id') !!}
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
    @show
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function () { 

    $('#manufacturer').change(function(){
        m_id = $(this).val();
        $.getJSON( "{{URL('manufacturer')}}/" + m_id,function(data){
            var $el = $("#type_id");
            $el.empty(); // remove old options
            $.each(data, function(key,value) {
              $el.append($("<option></option>")
                 .attr("value", value).text(key));
            });
        });
    }).change();

    $('.container').find('input[type=text],input[type=number], input[type=color], select,textarea').addClass('form-control');
});
</script>
@endsection
