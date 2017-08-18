@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row margin-vert-30">
            @include('includes.alert')
            	<div class="panel-body">
                    {!! Form::open(array('route' => ['otherRoom.update', $otherRoom->id],'method'=>'put','class' => 'form-horizontal')) !!}

                    <div class="form-group">
                        {!! Form::label('Room Number', 'Room Number *', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('roomNo', $otherRoom->roomNo , array('class' => 'form-control margin-bottom-20', 'placeholder' => 'Room Number *')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Capacity', 'Capacity *', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('capacity', $otherRoom->capacity , array('class' => 'form-control margin-bottom-20', 'placeholder' => 'Capacity *')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
@stop


