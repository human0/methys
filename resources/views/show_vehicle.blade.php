@extends('layouts.app')
@section('content')
<div class="jumbotron" style="background-color: {{$vehicle->color}}">
  <div class="container" >

    <div class="panel panel-default">
      <div class="panel-heading">Owner Information</div>
      <div class="panel-body">
        <dl>
            <dt>First name</dt>
            <dd> {{ $vehicle->user_detail->firstname }}</dd>
            <dt> Last name</dt>
            <dd> {{$vehicle->user_detail->lastname}}</dd>
            <dt> Number </dt>
            <dd> {{$vehicle->user_detail->number}}
        </dl>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Vehicle Information</h3>
      </div>
      <div class="panel-body">
        <dl>
            <dt>Manufacturer</dt>
            <dd>{{ $vehicle->type->manufacturer->name}}</dd>
            <dt>Type</dt>
            <dd>{{$vehicle->type->name}}</dd>
            <dt>Year</dt>
            <dd>{{$vehicle->year}}</dd>
            <dt>Mileage</dt>
            <dd>{{$vehicle->mileage}}</dd>
        </dl>
      </div>
    </div>

  </div>
</div>
@endsection