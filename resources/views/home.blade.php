@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center"> Welcome {{Auth::user()->user_detail->firstname}} {{Auth::user()->user_detail->lastname}}  </h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if (isset($vehicles))
            <div class="panel panel-default">
                <div class="panel-heading">                 
                    <a href="{{URL('vehicle/create')}}" class="btn btn-primary" style="float: right;" role="button">Add <span class="glyphicon glyphicon-plus"></span></a>
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
                                <dd> {{ $vehicle->user_detail->firstname }}</dd>
                                <dt> Last name</dt>
                                <dd> {{$vehicle->user_detail->lastname}}</dd>
                            </dl>
                            <dl>
                                <dt>Manufacturer</dt>
                                <dd>{{ $vehicle->type->manufacturer->name}}</dd>
                                <dt>Type</dt>
                                <dd>{{$vehicle->type->name}}</dd>
                            </dl>
                            <p>
                                {!! Form::open(['url' => "vehicle/{$vehicle->id}" , 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                <a href='{{URL("vehicle/{$vehicle->id}")}}' class="btn btn-primary" role="button">View <span class="glyphicon glyphicon-eye-open"></span></a> 
                                <a href='{{URL("vehicle/{$vehicle->id}/edit")}}' class="btn btn-default" role="button">Edit <span class="glyphicon glyphicon-wrench"></span></a>
                                
                                <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span></button>
                                {!! Form::close() !!}
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
