@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ORDER SUMMARY</h5>
                <div class="row">

                    <div class="col-md-12 ms-auto">
                        <h2 class="card-title mt-4">General Info</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Customer Name:</strong></td>
                                    <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Customer Email:</strong></td>
                                    <td>{{$order->user->email}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Unique #:</strong></td>
                                    <td>{{$order->order_number}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Payment Method:</strong></td>
                                    <td>{{$order->payment_method}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Payment Status:</strong></td>
                                    <td>{{$order->payment_status == 1 ? 'Paid' : 'Not Paid'}}</td>
                                </tr>
                                @if($order->ship_to_different_address)
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{$order->address}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Apartment:</strong></td>
                                    <td>{{$order->apartment}}</td>
                                </tr>
                                <tr>
                                    <td><strong>City:</strong></td>
                                    <td>{{$order->city}}</td>
                                </tr>
                                <tr>
                                    <td><strong>PostCode:</strong></td>
                                    <td>{{$order->postcode}}</td>
                                </tr>
                                @else
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{$order->user->address}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Apartment:</strong></td>
                                    <td>{{$order->user->apartment}}</td>
                                </tr>
                                <tr>
                                    <td><strong>City:</strong></td>
                                    <td>{{$order->user->city}}</td>
                                </tr>
                                <tr>
                                    <td><strong>PostCode:</strong></td>
                                    <td>{{$order->user->postcode}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td><strong>Order Notes:</strong></td>
                                    <td>{{$order->notes}}</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Custom</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $row)
                            <tr>
                                <td><img src="{{ asset('storage/product_images/' . $row->product->main_image) }}" alt="iMac" width="80"></td>
                                <td>{{$row->product_title}}</td>
                                <td>{{$row->product_quantity}}</td>
                                <td class="font-500">&pound{{$row->product_price}}</td>
                                <td>{{$row->product_size}}</td>
                                <td>{{$row->product_custom}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="font-500" align="right">Shiiping Price</td>
                                <td class="font-500">&pound{{$order->shipping_price}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="font-500" align="right">Total Amount</td>
                                <td class="font-500">&pound{{$order->total_price}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
