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
                <h4 class="card-title mb-0">Order List</h4>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display"
                        style="width:100%">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>User</th>
                              <th>Order #</th>
                              <th>Price</th>
                              <th>Details</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$order->user->first_name}}</td>
                                <td>{{$order->order_number}}</td>
                                <td>
                                    <div class="mb-1">
                                        Order Price: &pound{{$order->order_price}}
                                    </div>
                                    <div class="mb-1">
                                        Shipping: &pound{{$order->shipping_price}}
                                    </div>
                                    <div class="mb-1">
                                        Total Price: &pound{{$order->total_price}}
                                    </div>

                                </td>

                                <td><a href="{{route('admin.order.details',['id' => $order->id])}}"><button class="btn btn-xs btn-success">Details</button></td>
                                    <td>
                                        <div class="mb-1 text-center">
                                            @if($order->status == 0)
                                            <span class="badge rounded-pill font-weight-medium bg-light-danger text-danger">pending</span>
                                            @elseif($order->status == 1)
                                            <span class="badge rounded-pill font-weight-medium bg-light-secondary text-secondary">Accepted</span>
                                            @elseif($order->status == 2)
                                            <span class="badge rounded-pill font-weight-medium bg-light-primary text-primary">Dispatched</span>
                                            @elseif($order->status == 3)
                                            <span class="badge rounded-pill font-weight-medium bg-light-success text-success">Completed</span>
                                            @endif
                                        </div>
                                        <div class="mt-2">
                                            <form id="orderForm" action="{{route('admin.order.status-change',['id' => $order->id])}}" method="post">
                                                <select name="status" id="statusSelect" class="form-select">
                                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Pending</option>
                                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Accepted</option>
                                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Dispatched</option>
                                                    <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Completed</option>
                                                </select>
                                                @csrf
                                            </form>
                                        </div>
                                    </td>


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
<script>
    $(document).ready(function () {
        // Assuming $order->status is the initial status value

        // Check if the initial status is 0, set the selected option text to "Pending"
        if ($("#statusSelect").val() == 0) {
            $("#statusSelect option:selected").text('Pending');
        }

        // Change event handler for the status dropdown
        $("#statusSelect").change(function () {
            // If the selected value is 0, set the selected option text to "Pending"
            if ($(this).val() == 0) {
                $(this).find("option:selected").text('Pending');
            } else {
                // Otherwise, set it to the corresponding status text
                $(this).find("option:selected").text($(this).find("option:selected").text());
            }
        });
        $("#statusSelect").change(function () {
            // Submit the form when the option is changed
            $("#orderForm").submit();
        });
    });
</script>
@endsection
