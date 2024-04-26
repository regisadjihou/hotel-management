@extends('frontend.layouts.master')

@section('styles')
<style>
   .pro-title {
        max-width: 350px; /* Adjust the maximum width as needed */
        word-wrap: break-word;
    }
    .pro-title a {
        display: inline-block;
        max-width: 300px; /* Adjust the maximum width as needed */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endsection
@section('content')

 <!-- cart main wrapper start -->
 <div class="page-padding pt-100 pb-100 pt-sm-60 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('update-cart')}}" method="post">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Thumbnail</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-size">Size</th>
                                <th class="pro-custom">Custom</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $c)
                            <tr>
                                @php $product = \App\Models\Product::findOrFail($c['product_id']) @endphp
                                <td class="pro-thumbnail">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('product_images/' . $product->main_image) }}" alt="Product"/>
                                    </a>
                                </td>
                                <td class="pro-title" >
                                    <a class="product-link" href="{{route('product-details',['id' => $product->id])}}" target="_blank" >
                                        @php
                                            $wrappedTitle = wordwrap($product->title, 30, "<br>\n", false);
                                            echo $wrappedTitle;
                                        @endphp
                                    </a>
                                </td>
                                <td>{{$c['size']}}</td>
                                <td>{{$c['custom']}}</td>
                                <td class="pro-price"><span>{{$product->price}}</span></td>
                                <td class="pro-quantity">
                                    <div class="pro-qty"><input type="text" name="quantity[{{ $c['product_id'] }}]" value="{{$c['quantity']}}" min="1"></div>
                                </td>
                                <td class="pro-subtotal"><span>{{number_format($c['quantity'] * $product->price,2)}}</span></td>
                                <td class="pro-remove"> <a href="{{ route('remove-from-cart', ['product_id' => $product->id]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        {{-- <div class="apply-coupon-wrapper">

                                <input type="text" placeholder="Enter Your Coupon Code" />
                                <button type="button" class="check-btn">Apply Coupon</button>

                        </div> --}}
                        <div class="cart-update">
                            <button type="submit" class="check-btn">Update Cart</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 ml-auto">
                @php
                    $total = 0;
                    $shipping = 0;
                    foreach($cart as $c)
                    {
                        $total += number_format($c['price'] * $c['quantity'],2);
                    }
                @endphp
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>&pound{{$total}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>&pound{{$shipping}}</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">&pound{{number_format($total+$shipping,2)}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="{{route('checkout')}}" class="check-btn d-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

@endsection
@section('scripts')
@if(Session::has('updated_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{Session::get('updated_success')}}",
            showConfirmButton: true
        });
    </script>
@endif
@if(Session::has('removed_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{Session::get('removed_success')}}",
            showConfirmButton: true
        });
    </script>
@endif
@endsection

