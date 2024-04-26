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
                <h4 class="card-title mb-0">Staff List</h4>
                <a href="{{route('admin.users.create',['type' => 'staff'])}}"><button class="btn btn-success" style="display:inline-block;float:right;">Create Staff </button></a>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Phone #</th>
                                <th>Email</th>
                                <th>Salary</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Hired Date</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($users as $user)
                            <tr>
                                <td>{{$count++}}</td>
                                <td><img src="{{ asset('user_images/' . $user->image) }}" style="width:50px;" alt=""></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->position}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->salary}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->age}} Years</td>
                                <td>{{$user->hired_date}}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-warning">Edit</a>
                                        <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger ms-2">Delete</a>
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
