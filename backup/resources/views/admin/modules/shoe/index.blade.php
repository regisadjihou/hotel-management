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
                <h4 class="card-title mb-0">Shoes List</h4>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display"
                        style="width:100%">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Product Title</th>
                              <th>Price</th>
                              <th>Category / Sub Category</th>
                              <th>Details</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($products as $product)
                            <tr>
                                <td>{{$count++}}</td>
                                <td><img src="{{ asset('storage/product_images/' . $product->main_image) }}" style="width:50px;" alt=""></td>
                                <td>{{$product->title}}</td>
                                <td>&pound;{{$product->price}}</td>



                                <td>
                                    <div class="mb-1">
                                        <span class="badge rounded-pill font-weight-medium bg-light-primary text-primary">{{$product->category->title}}</span>
                                    </div>
                                    <div class="mb-1">
                                        <span class="badge rounded-pill font-weight-medium bg-light-primary text-secondary">{{$product->sub_category->title}}</span>
                                    </div>
                                </td>
                                <td><a href="{{route('product-details',['id' => $product->id])}}" target="_blank"><button class="btn btn-xs btn-success">Details</button></td>
                                    @if($product->status == 1)
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        </div>
                                    </td>
                                    @elseif($product->status == 0)
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                        </div>
                                    </td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-xs btn-warning">Edit</a>
                                            <a href="#" class="btn btn-xs btn-danger ms-2">Delete</a>
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
