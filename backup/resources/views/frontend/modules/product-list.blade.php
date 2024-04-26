@extends('frontend.layouts.master')


@section('content')

<div class="page-main-wrapper pt-40 pb-5 pt-sm-55 pb-sm-30">
    <div class="container">
        <div class="row">
            <!-- shop main wrapper start -->
            <div class="col-lg-9 order-lg-2">
                <div class="shop-product-wrap pb-md-50 pb-sm-5">
                    <div class="shop-top-bar">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="top-bar-left">

                                    <div class="product-amount" id="products_count">
                                        @if(count($products) > 1)
                                        <h4> {{count($products)}} products</h4>
                                        @else
                                        <h4>{{count($products)}} product</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                        <p>Sort By : </p>
                                        <select class="nice-select" name="sortby" id="sortBy">
                                            <option value="relevance">Relevance</option>
                                            <option value="name-asc">Name (A - Z)</option>
                                            <option value="name-desc">Name (Z - A)</option>
                                            <option value="price-low-high">Price (Low &gt; High)</option>
                                            <option value="price-high-low">Price (High &gt; Low)</option>
                                            <option value="rating">Rating (Lowest)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid row" id="products_container">

                            @include('frontend.snippets.product-list', ['products' => $products])

                    </div>




                </div>
            </div>
            <!-- shop main wrapper end -->
            <!-- shop sidebar start -->
            <div class="col-lg-3 order-lg-1">
                <div class="shop-sidebar-wrap clearfix pb-md-65">
                    <div class="shop-sidebar mb-30">
                        <h4 class="title mb-20">Categories</h4>
                        <ul class="sidebar-category">
                            @foreach($categories as $category)
                                <li><a href="#" class="category-link" data-category="{{ $category->id }}">{{ $category->title }}</a>
                                    <ul class="children">
                                        <li><a href="#" class="subcategory-link" data-category="{{ $category->id }}" data-subcategory="all">All</a></li>
                                        @foreach($category->active_sub_categories() as $sub_category)
                                            <li><a href="#" class="subcategory-link" data-category="{{ $category->id }}" data-subcategory="{{ $sub_category->id }}">{{ $sub_category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div> <!-- single sidebar end -->
                    <div class="shop-sidebar mb-30">
                        <h4 class="title mb-30">Price</h4>
                        <ul class="price-container">
                            <li>
                                <label class="radio-container">
                                    All
                                    <input type="radio" name="price" data-min="1" data-max="1000" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">
                                    £1-£20
                                    <input type="radio" name="price" data-min="1" data-max="20">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">
                                    £21-£40
                                    <input type="radio" name="price" data-min="21" data-max="40">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">
                                    £41-£60
                                    <input type="radio" name="price" data-min="41" data-max="60">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">
                                    £61-£80
                                    <input type="radio" name="price" data-min="61" data-max="80">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">
                                    £81-£100
                                    <input type="radio" name="price" data-min="81" data-max="100">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-container">
                                    £100+
                                    <input type="radio" name="price" data-min="100" data-max="999999"> <!-- Use a large number for '£100+' -->
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- shop sidebar end -->
        </div>
    </div>
</div>
<input type="hidden" id="league_id" value="{{ $league_id ?? '' }}">
<input type="hidden" id="team_id" value="{{ $team_id ?? '' }}">
<input type="hidden" id="country_id" value="{{ $country_id ?? '' }}">
<input type="hidden" id="category" value="">
<input type="hidden" id="subcategory" value="">
<input type="hidden" id="min" value="1">
<input type="hidden" id="max" value="1000">
<input type="hidden" id="sort" value="">
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.subcategory-link').on('click', function () {
            var category = $(this).data('category');
            var subcategory = $(this).data('subcategory');
            $('#category').val(category);
            $('#subcategory').val(subcategory);
            category_filter();
        });
        $('input[name="price"]').on('click', function () {
            var minPrice = $(this).data('min');
            var maxPrice = $(this).data('max');
            $('#min').val(minPrice);
            $('#max').val(maxPrice);
            price_filter();
        });
        $('#sortBy').on('change', function () {
            sort();
        });
        function category_filter()
        {
            var league_id =  $('#league_id').val();
            var team_id =  $('#team_id').val();
            var country_id =  $('#country_id').val();
            var sortBy = $('select[name="sortby"]').val();

            $.ajax({
                url: "{{route('product-filter')}}",
                type: 'GET',
                data: {league_id:league_id,team_id:team_id,country_id:country_id,category:$('#category').val(),sub_category:$('#subcategory').val(),min_price: $('#min').val(),max_price: $('#max').val(),sortby: sortBy},
                success: function (response) {
                    $('#products_container').html(response.products);
                    $('#products_count').html('<h4>' + response.count + ' Products </h4>');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
        function price_filter()
        {
            var league_id =  $('#league_id').val();
            var team_id =  $('#team_id').val();
            var country_id =  $('#country_id').val();
            var sortBy = $('select[name="sortby"]').val();
            // Send AJAX request to ProductController with categoryId and subcategoryId
            $.ajax({
                url: "{{route('product-filter')}}",
                type: 'GET',
                data: {league_id:league_id,team_id:team_id,country_id:country_id,category:$('#category').val(),sub_category:$('#subcategory').val(),min_price: $('#min').val(),max_price: $('#max').val(),sortBy:sortBy},
                success: function (response) {
                    $('#products_container').html(response.products);
                    $('#products_count').html('<h4>' + response.count + ' Products </h4>');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
        function sort()
        {
            var league_id =  $('#league_id').val();
            var team_id =  $('#team_id').val();
            var country_id =  $('#country_id').val();
            var sortBy = $('select[name="sortby"]').val();

            $.ajax({
                url: "{{route('product-filter')}}",
                type: 'GET',
                data: {league_id:league_id,team_id:team_id,country_id:country_id,category:$('#category').val(),sub_category:$('#subcategory').val(),min_price: $('#min').val(),max_price: $('#max').val(),sortBy:sortBy},
                success: function (response) {
                    $('#products_container').html(response.products);
                    $('#products_count').html('<h4>' + response.count + ' Products </h4>');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }

});
</script>
@endsection
