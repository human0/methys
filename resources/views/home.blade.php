@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center"> Welcome {{Auth::user()->name}} {{Auth::user()->lastname}} </h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if (isset($vehicles))
            <div class="panel panel-default">
                <div class="panel-heading">                 
                    <a href="#" class="btn btn-primary" style="float: right;" role="button">Add <span class="glyphicon glyphicon-plus"></span></a>
                    <h4 class="text-center"> Vehicles </h4>
                </div>
                <div class="panel-body">
                <div class="row">
                    @foreach ($vehicles as $vehicle)
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <div class="caption">
                            <h3></h3>
                            <dl>
                                <dt>First name</dt>
                                <dd> {{ $vehicle->user->name }}</dd>
                                <dt> Last name</dt>
                                <dd> {{$vehicle->user->lastname}}</dd>
                            </dl>
                            <dl>
                                <dt>Manufacturer</dt>
                                <dd>{{ $vehicle->type->manufacturer->name}}</dd>
                                <dt>Type</dt>
                                <dd>{{$vehicle->type->name}}</dd>
                            </dl>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">View <span class="glyphicon glyphicon-eye-open"></span></a> 
                                <a href="#" class="btn btn-default" role="button">Edit <span class="glyphicon glyphicon-wrench"></span></a>
                                <a href="#" class="btn btn-danger" role="button"> <span class="glyphicon glyphicon-remove"></span></a>
                            </p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                    <div class="text-center">{{ $vehicles->links() }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
