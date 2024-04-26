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
                <h4 class="card-title mb-0">Booking List</h4>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Room Name</th>
                                <th>Room Price</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Special Request</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{$count++}}</td>
                                <td><img src="{{ asset('room_images/' . $booking->room->thumb) }}" style="width:50px;" alt=""></td>
                                <td>{{$booking->room->name}}</td>
                                <td>{{$booking->room->price}}</td>
                                <td>{{$booking->name}}</td>
                                <td>{{$booking->email}}</td>
                                <td>{{$booking->adults}}</td>
                                <td>{{$booking->child}}</td>
                                <td>{{$booking->note}}</td>
                                <td>
                                    {{$booking->payment_status == 1 ? 'Paid' : 'Not Paid'}}
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
