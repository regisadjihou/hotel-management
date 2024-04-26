
<div class="col">
    <div class="product__item mb-50">
        <div class="product__thumb mb-20">
            <a class="img-overlay" href="{{route('product-details',['id' => $product->id])}}">
                <img class="pri-img" src="{{ asset('product_images/' . $product->main_image) }}" alt="{{ $product->name }}">
                <img class="sec-img" src="{{ asset('product_images/' . $product->main_image) }}" alt="{{ $product->name }}">
            </a>
            <div class="action_link">
                <a title="Add to Cart" href="#"><i class="pe-7s-cart"></i></a>
                <a title="Add to Wishlist" href="#"><i class="pe-7s-like"></i></a>
                <a title="Quick View" href="#" data-bs-target="#quick_view" data-bs-toggle="modal"><i class="pe-7s-look"></i></a>
                <a title="Details" href="#"><i class="pe-7s-copy-file"></i></a>
            </div>
        </div>
        <div class="product__content">
            <h6><a href="{{route('product-details',['id' => $product->id])}}">{{$product->title}}</a></h6>
            <p><a href="{{route('product-details',['id' => $product->id])}}">Thai Quality</a></p>
            <div class="product__price__Ratings">
                <div class="price__box">
                    <span class="regular-price">£{{$product->price}}</span>
                </div>
                <div class="ratings">
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                </div>
            </div>
        </div>
    </div> <!-- product single item end -->
</div> <!-- product single column end -->

