@extends('admin.layouts.master')

@section('styles')
 <!-- This Page CSS -->
 <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <style>
    .cross-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        cursor: pointer;
        color: red; /* Change this to the desired color */
    }
    .image-container{
        width:200px;
    }
    .image-container img{
        width:200px;
    }
    .image-container:hover img {
        filter: brightness(70%); /* Adjust the brightness to control the overlay darkness */
    }
    .image-container-multiple {
        display: flex;
        flex-wrap: wrap;
    }

    .image-item {
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;

    }
    .image-item img{
        width: 200px;
    }

    .image-container:hover .cross-icon {
        opacity: 1;
    }
    .image-item:hover .cross-icon {
        display: block;
    }
    .cross-icon-multiple{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        cursor: pointer;
        color: red; /* Change this to the desired color */
    }
    .image-item:hover img {
        filter: brightness(70%); /* Adjust the brightness to control the overlay darkness */
    }
    .image-item:hover .cross-icon-multiple {
        opacity:1; /* Show the cross icon on hover */
    }
 </style>
@endsection

@section('content')


    <form action="{{ route('admin.product.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="row">
            <div class="col-12 form-group mt-2">
                <label for="leagueOrCountry">League Or Country:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="leagueOrCountry" name="leagueOrCountry">
                    <option value="league" {{ $product->is_league_team == 1 ? 'selected' : '' }}>League</option>
                    <option value="country" {{ $product->is_country_team == 1 ? 'selected' : '' }}>Country</option>
                </select>
                @error('leagueOrCountry')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row" id="leagueTeamSection" style="{{$product->is_league_team ? 'block' : 'none'}}">

                @include('admin.modules.snippets.edit-leagues',['leagues' => $leagues])
                @include('admin.modules.snippets.edit-teams',['teams' => $teams])
            </div>


            <div class="row" id="countryTeamSection" style="{{$product->is_country_team ? 'block' : 'none'}}">
                @include('admin.modules.snippets.edit-countries',['countries' => $countries])
                @include('admin.modules.snippets.edit-country_teams',['country_teams' => $country_teams])
            </div>

            <!-- Main Category i.e. Clothing, footwear etc -->
            @include('admin.modules.snippets.edit-categories')
            @include('admin.modules.snippets.edit-sub_categories')

        </div>
        <hr>
        <div class="row mt-3">
            <h3>Product Information</h3>
            <!-- ... (similar changes for other input fields) ... -->
            <div class="col-6 form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" class="form-control form-control-lg" placeholder="Product Name" value="{{ old('productName',$product->title)}}">
                @error('productName')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="productPrice">Product Price:</label>
                <input type="text" id="productPrice" name="productPrice" class="form-control form-control-lg" placeholder="Product Price" value="{{ old('productPrice',$product->price)}}">
                @error('productPrice')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                @php
                    $sizesArray = \App\Models\ProductSize::where('product_id', $product->id)->pluck('size')->toArray();
                    $sizes = implode(', ', $sizesArray);
                @endphp
                <label for="productPrice">Product Sizes:(comma separated values i.e. S,M or 40,41 etc)</label>
                <input type="text" id="productSize" name="productSize" class="form-control form-control-lg" placeholder="Product Sizes" value="{{ old('productSizes', $sizes) }}">
                @error('productSizes')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                @php
                    $customItemsArray = \App\Models\ProductCustom::where('product_id', $product->id)->pluck('custom_title')->toArray();
                    $customItems = implode(', ', $customItemsArray);
                @endphp

                <label for="productCustomItems">Product Custom Items:</label>
                <input type="text" id="productCustomItems" name="productCustomItems" class="form-control form-control-lg" placeholder="Product Custom Items" value="{{ old('productCustomItems', $customItems) }}">
                @error('productCustomItems')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 form-group mt-3 position-relative">
                <div class="image-container mb-2 position-relative">
                    <img src="{{ asset('product_images/' . $product->main_image) }}" alt="">
                    <div class="cross-icon" onclick="deleteImage('{{ $product->id }}')">
                        <i class="fas fa-times fa-2x"></i>
                    </div>
                </div>
                <label for="mainImage">Product Main Image: (The Thumbnail image)</label>
                <input type="file" class="form-control" name="mainImage" id="mainImage">
                @error('mainImage')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 form-group mt-3">
                <div class="image-container-multiple mb-2 position-relative">
                    @foreach($product->images as $image)
                        <div class="image-item">
                            <img src="{{ asset('product_images/' . $image->image) }}" alt="">
                            <div class="cross-icon-multiple" data-image-id="{{ $image->id }}" onclick="deleteMultipleImage('{{ $image->id }}')">
                                <i class="fas fa-times fa-2x"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <label for="multipleImages">Product Other Images (attach multiple images):</label>
                <input type="file" class="form-control" name="multipleImages[]" multiple id="multipleImages">
                @error('multipleImages')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-12 mt-3">
                <label for="productDescription">Product Description:</label>
                <textarea name="productDescription" id="productDescription" class="summernote">{{ $product->description }}</textarea>
                @error('productDescription')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>



@endsection

@section('scripts')
<script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/forms/select2/select2.init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
    $(document).ready(function () {

        $('#league').on('change', function () {
            var leagueId = $(this).val();

            // Make an AJAX request to fetch subcategories
            $.ajax({
                url: "{{ route('admin.product.get-league-teams') }}",
                type: 'GET',
                data: { league_id: leagueId },
                success: function (response) {

                    $('#team').empty();

                    // Add new options
                    $.each(response.teams, function (key, value) {
                        $('#team').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
        $('#country').on('change', function () {
            var countryId = $(this).val();

            // Make an AJAX request to fetch subcategories
            $.ajax({
                url: "{{ route('admin.product.get-country-teams') }}",
                type: 'GET',
                data: { country_id: countryId },
                success: function (response) {

                    $('#countryTeam').empty();

                    // Add new options
                    $.each(response.teams, function (key, value) {
                        $('#countryTeam').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
        $('#productCategory').on('change', function () {
            var categoryId = $(this).val();

            // Make an AJAX request to fetch subcategories
            $.ajax({
                url: "{{ route('admin.product.get-category-sub-categories') }}",
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {

                    $('#productSubCategory').empty();

                    // Add new options
                    $.each(response.sub_categories, function (key, value) {
                        $('#productSubCategory').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        $("#leagueOrCountry").change(function () {
            var selection = $(this).val();
            $("#leagueTeamSection, #countryTeamSection").hide();

            if (selection === "league") {
                $("#leagueTeamSection").show();
            } else if (selection === "country") {
                $("#countryTeamSection").show();
            }
        });
        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });


    });
    function deleteImage(productId) {
        if (confirm("Are you sure you want to delete this image?")) {
            // Make an AJAX request to delete the image
            $.ajax({
                url: "{{route('admin.product.image-delete')}}", // Change this to your Laravel route
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { productId: productId },
                success: function (response) {
                    // Remove the image from the HTML
                    $('.cross-icon').parent().remove();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
    }
    function deleteMultipleImage(imageId) {
        if (confirm("Are you sure you want to delete this image?")) {
            // Make an AJAX request to delete the image
            $.ajax({
                url: "{{route('admin.product.image-multiple-delete')}}", // Change this to your Laravel route
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { imageId: imageId },
                success: function (response) {
                    // Remove the image from the HTML
                    $('.cross-icon-multiple[data-image-id="' + imageId + '"]').parent().remove();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
    }
</script>
@endsection
