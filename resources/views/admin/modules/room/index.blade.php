@extends('admin.layouts.master')

@section('styles')
<link href="{{asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Room List</h4>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($rooms as $room)
                            <tr>
                                <td>{{$count++}}</td>
                                <td><img src="{{ asset('room_images/' . $room->thumb) }}" style="width:50px;" alt=""></td>
                                <td>{{$room->name}}</td>
                                <td>{{$room->number}}</td>
                                <td>{{$room->type}}</td>
                                @php
                                    $description = strip_tags($room->description); // Remove HTML tags
                                    $description = \Illuminate\Support\Str::limit($description, 50);
                                @endphp
                                <td>{!! $description !!}</td>
                                <td>{{$room->adults}}</td>
                                <td>{{$room->children}}</td>
                                <td>{{$room->price}}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.rooms.edit', ['id' => $room->id]) }}" class="btn btn-xs btn-warning">Edit</a>
                                        <a href="{{ route('admin.rooms.delete', ['id' => $room->id]) }}" class="btn btn-xs btn-danger ms-2">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('admin.includes.index-scripts')
@endsection
