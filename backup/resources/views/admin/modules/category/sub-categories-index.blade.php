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
                <h4 class="card-title mb-0" style="display: inline-block;">Sub Categories List</h4>
                <a href="{{route('admin.subcategory.create')}}" style="float:right;"><button class="btn btn-success">Insert New Sub Category</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display"
                        style="width:100%">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Sub Category Name</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($sub_categories as $key)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$key->title}}</td>
                                <td>{{$key->category->title}}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheck{{$key->id}}" @if($key->status == 1) checked @endif data-sub-category-id="{{$key->id}}">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('admin.subcategory.edit',['id' => $key->id])}}"><button class="btn btn-xs btn-warning">Edit</button></a>
                                    <a href="{{route('admin.subcategory.delete',['id' => $key->id])}}"><button class="btn btn-xs btn-danger">Delete</button></a>
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
<script>
    $(document).ready(function() {
        $('.form-check-input').on('click', function() {
            var subcategoryId = $(this).data('sub-category-id');

            // Reload the page with the updated status
            window.location.href = '{{ route("admin.subcategory.status", ["id" => "__ID__"]) }}'.replace('__ID__', subcategoryId);
        });
    });
</script>
@endsection
