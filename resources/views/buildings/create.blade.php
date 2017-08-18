@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row margin-vert-30">
            @include('includes.alert')

            	<div class="panel-body">
                    {!! Form::open(array('route' => 'building.store','method'=>'post','class' => 'form-horizontal')) !!}

                    <div class="form-group">
                        {!! Form::label('Building name', 'Building name*', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('building', '' , array('class' => 'form-control margin-bottom-20', 'placeholder' => 'Building name *')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Number of room', 'Number of room *', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('total_room', '' , array('class' => 'form-control margin-bottom-20', 'placeholder' => 'Number of room *')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Number of Classroom', 'Number of Classroom *', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('classroom', '' , array('class' => 'form-control margin-bottom-20', 'placeholder' => 'Number of Classroom *')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Number of Labroom', 'Number of Labroom *', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::text('labroom', '' , array('class' => 'form-control margin-bottom-20', 'placeholder' => 'Number of Labroom *')) !!}
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
