@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                	<br>
                    {{ $title }}
                    <a href="{!! route('building.create') !!}" class="btn btn-primary pull-right">Create New Building</a>
                    <br>

                </header>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">Building ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">No. of rooms</th>
                            <th class="text-center">No. of classrooms</th>
                            <th class="text-center">No. of labrooms</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($buildings as $building)
                          <tr> 
                            <td class="text-center">{!! $building->id !!}</td>
                            <td class="text-center">{!! $building->name !!}</td>
                            <td class="text-center">{!! $building->total_room !!}</td>
                            <td class="text-center">{!! $building->classroom !!}</td>
                            <td class="text-center">{!! $building->labroom !!}</td>
                            <!-- only if he is the admin -->
                            <td class="text-center">
                                <a class="btn btn-success" href="{!! route('building.classroom',$building->id) !!}">Class Rooms</a>
                                <a class="btn btn-success" href="{!! route('building.labroom',$building->id) !!}">Lab Rooms</a>
                                <a class="btn btn-success" href="{!! route('building.others',$building->id) !!}">Other Rooms</a><br>
                                <a class="btn btn-danger" href="{!! route('building.edit',$building->id) !!}">Edit</a>
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
