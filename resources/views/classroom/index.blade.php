@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                	<br>
                    {{ $title }}
                    <a href="{!! route('classroom.create',$building_id) !!}" class="btn btn-primary pull-right">Create New Classroom</a>
                    <br>

                </header>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">Classroom ID</th>
                            <th class="text-center">Room No</th>
                            <th class="text-center">Capacity</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $class)
                          <tr> 
                            <td>{!! $class->id !!}</td>
                            <td>{!! $class->roomNo !!}</td>
                            <td>{!! $class->capacity !!}</td>
                            <!-- only if he is the admin -->
                            <td class="text-center">
                                <a class="btn btn-success" href="{!! route('classroom.edit',$class->id) !!}">Edit</a>
                                <a class="btn btn-danger" href="#">Delete</a>
                            </td>

                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>
@stop

