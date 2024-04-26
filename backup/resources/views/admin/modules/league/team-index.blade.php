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
                <h4 class="card-title mb-0" style="display: inline-block;">League Teams List</h4>
                <a href="{{route('admin.league-team.create')}}" style="float:right;"><button class="btn btn-success">Insert New League Team</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display"
                        style="width:100%">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Team Name</th>
                              <th>League</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($teams as $key)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->league->title}}</td>
                                @if($key->status == 1)
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    </div>
                                </td>
                                @elseif($key->status == 0)
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                    </div>
                                </td>
                                @endif
                                <td>
                                    <a href=""><button class="btn btn-xs btn-warning">Edit</button></a>
                                    <a href=""><button class="btn btn-xs btn-danger">Delete</button></a>
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
