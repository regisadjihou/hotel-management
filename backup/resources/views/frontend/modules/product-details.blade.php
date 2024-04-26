@extends('frontend.layouts.master')

@section('styles')
    <style>
        .product-description table{
            border:1px solid #000;
        }
        .product-description table tr td{
            border:1px solid #000;
            padding:10px;
        }
        .product-description p{
            font-size:16px;
            margin-bottom:10px;
        }
        .product-description  p font{
            font-size:16px;
            margin-bottom:10px;
        }
        .product-description  b{
            font-weight: 700;
        }
        .size-list {
        list-style-type: none;
        padding: 0;
    }

    .size-list li {
        display: inline-block;
        margin: 5px;
    }

    input[type="radio"] {
        display: none; /* Hide the default radio button */
    }

    .size-label, .custom-label {
        position: relative;
        padding: 10px;
        border: 2px solid #ccc;
        cursor: pointer;
        display: inline-block;
        margin: 5px;
    }

    .size-label:hover, .custom-label:hover {
        background-color: #f8f8f8;
    }

    input[type="radio"]:checked + .size-label,
    input[type="radio"]:checked + .custom-label {
        border-color: #FACE49;
    }

    input[type="radio"]:checked + .size-label:before,
    input[type="radio"]:checked + .custom-label:before {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 25px 25px 0px 0px;
        border-color: transparent #FACE49 transparent transparent;
    }

    input[type="radio"]:checked + .size-label:after,
    input[type="radio"]:checked + .custom-label:after {
        content: '\2713'; /* Checkmark character */
        font-size: 12px;
        color: #fff;
        position: absolute;
        bottom: -2px;
        right: 2px;
    }


    </style>
@endsection
@section('content')
<!-- product details wrapper start -->
<div class="product-details-main-wrapper pt-100 pb-sm-20 pt-sm-55">
    <div class="container">
        <div class="product-details-wrapper">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product-large-slider mb-20">
                        <div class="pro-large-img">
                            <img src="{{ asset('product_images/' . $product->main_image) }}" alt="{{$product->title}}" />
                            <div class="img-view">
                                <a class="img-popup" href="{{ asset('product_images/' . $product->main_image) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        @foreach($product->images as $image)
                        <div class="pro-large-img">
                            <img src="{{ asset('product_images/' . $image->image) }}" alt="{{$product->title}}" />
                            <div class="img-view">
                                <a class="img-popup" href="{{ asset('product_images/' . $image->image) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="pro-nav slick-arrow-style2 arrow3">
                        <div class="pro-nav-thumb"><img src="{{ asset('product_images/' . $product->main_image) }}" alt="" /></div>
                        @foreach($product->images as $image)
                        <div class="pro-nav-thumb"><img src="{{ asset('product_images/' . $image->image) }}" alt="" /></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product__details__content mb-30 mt-md-40 mt-sm-40">
                        <h2><a href="">{{$product->title}}</a></h2>
                        <h6><a href="">studio design</a></h6>
                        <div class="ratings mb-10">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <a class="rev-btn" href="#">1 reviews</a>
                        </div>
                        <div class="price-box">
                            @if($product->discount == 0)
                                <span class="regular-price">£{{ $product->price }}</span>
                            @else
                                <span class="regular-price">£{{ $product->discountedPrice() }}</span>
                                <span class="old-price"><del>£{{ $product->price }}</del></span>
                            @endif
                        </div>
                        <form method="post" action="{{route('add-to-cart')}}">
                        <div style="margin-bottom: 20px;">
                            <h4>Available Sizes:</h4>
                            <ul class="size-list">
                                @foreach($product->sizes as $size)
                                    <li>
                                        <input type="radio" name="selected_size" id="size_{{ $size->id }}" value="{{ $size->size }}">
                                        <label for="size_{{ $size->id }}" class="size-label">{{ $size->size }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <h4>Custom Items:</h4>
                            <ul class="size-list">
                            @foreach($product->customs as $custom)
                            <li>
                                <input type="radio" name="selected_custom" id="custom_{{ $custom->id }}" value="{{ $custom->custom_title }}">
                                <label for="custom_{{ $custom->id }}" class="custom-label">{{ $custom->custom_title }}</label>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                        <form method="post" action="{{route('add-to-cart')}}">
                            <div class="action_link mb-30">
                                @csrf
                                @php
                                    if (session()->has('cart')) {
                                    $cart = session('cart');
                                   // dd($cart);
                                    $product_id = $product->id;
                                    $isProductInCart = isset($cart[$product_id]);

                                    }
                                @endphp
                                @if(!empty($isProductInCart))
                                <button class="add_btn"  disabled="true"><i class="pe-7s-cart"></i> already in cart</button>
                                <a href="{{route('checkout')}}"><button type="button" class="add_btn" style="margin-left:15px;"><i class="pe-7s-cart"></i> Checkout</button></a>
                                @else
                                <button class="add_btn" ><i class="pe-7s-cart"></i> add to cart</button>
                                @endif
                            </div>
                            <div class="quantity mb-20">
                                <h5>Quantity:</h5>
                                <input type="hidden" name="product_id" value="{{encrypt($product->id)}}">
                                <div class="pro-qty"><input type="text" value="1" name="quantity"></div>
                            </div>
                        </form>
                        <div class="useful-links mb-20">
                            <a href="#"><i class="fa fa-heart-o"></i>add to wishlist</a>
                            <a href="#"><i class="fa fa-refresh"></i>compare product</a>
                        </div>
                        <div class="tag-line mb-20">
                            <h5>Tags:</h5>
                            <a href="#">Electronic,</a>
                            <a href="#">Smartphone,</a>
                            <a href="#">Phone</a>
                        </div>
                        <div class="share-icon mb-20">
                            <h5>Share: </h5>
                            <a class="bg-facebook" href="#"><i class="fa fa-facebook"></i>share</a>
                            <a class="bg-twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                            <a class="bg-google" href="#"><i class="fa fa-google-plus"></i>google +</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details wrapper end -->

<!-- product details reviews start -->
<div class="product-details-reviews pt-98 pt-md-70 pt-sm-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-review-info mt-half">
                    <ul class="nav nav-pills justify-content-center mb-20" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav_desctiption" data-bs-toggle="pill" href="#tab_description" role="tab" aria-controls="tab_description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_review" data-bs-toggle="pill" href="#tab_review" role="tab" aria-controls="tab_review" aria-selected="false">Reviews (1)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active product-description" id="tab_description" role="tabpanel" aria-labelledby="nav_desctiption">
                            {!! $product->description !!}
                        </div>

                        <div class="tab-pane fade" id="tab_review" role="tabpanel" aria-labelledby="nav_review">
                            <div class="product-review">
                                <div class="customer-review">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Prowin Themes</strong></td>
                                                <td class="text-end">09/04/2018</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p>It’s both good and bad. If Nikon had achieved a high-quality wide lens camera with a 1 inch sensor, that would have been a very competitive product. So in that sense, it’s good for us. But actually, from the perspective of driving the 1 inch sensor market, we want to stimulate this market and that means multiple manufacturers.</p>
                                                    <div class="product-ratings mt-10">
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end of customer-review -->
                                <form action="#" class="review-form">
                                    <h5>Write a review</h5>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-form-label"><span class="text-danger">*</span> Your Name</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-form-label"><span class="text-danger">*</span> Your Review</label>
                                            <textarea class="form-control" required></textarea>
                                            <div class="help-block pt-10"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-form-label"><span class="text-danger">*</span> Rating</label>
                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                            <input type="radio" value="1" name="rating">
                                            &nbsp;
                                            <input type="radio" value="2" name="rating">
                                            &nbsp;
                                            <input type="radio" value="3" name="rating">
                                            &nbsp;
                                            <input type="radio" value="4" name="rating">
                                            &nbsp;
                                            <input type="radio" value="5" name="rating" checked>
                                            &nbsp;Good
                                        </div>
                                    </div>
                                    <div class="buttons d-flex justify-content-end">
                                        <button class="rev-btn" type="submit">Continue</button>
                                    </div>
                                </form> <!-- end of review-form -->
                            </div> <!-- end of product-review -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details reviews end -->

<!-- related products area start -->
<div class="related-products-area pt-93 pb-43 pt-sm-40 pb-sm-15">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title text-center mb-30">
                    <h2>related <span>products</span></h2>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="product-carousel-active2 row slick-arrow-style2">
           @foreach($related_products as $product)
           @include('frontend.snippets.products')
           @endforeach
        </div>
    </div>
</div>
<!-- related products area end -->
@endsection

@section('scripts')
@if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{Session::get('success')}}",
            showConfirmButton: true
        });
    </script>
@endif
@endsection
