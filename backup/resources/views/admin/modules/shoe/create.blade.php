@extends('admin.layouts.master')

@section('styles')
 <!-- This Page CSS -->
 <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
@endsection

@section('content')


    <form action="{{ route('admin.product.shoes.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <!-- Main Category i.e. Clothing, footwear etc -->
            @include('admin.modules.snippets.categories')
            @include('admin.modules.snippets.sub_categories')

        </div>
        <hr>
        <div class="row mt-3">
            <h3>Product (shoes) Information</h3>
            <!-- ... (similar changes for other input fields) ... -->
            <div class="col-6 form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" class="form-control form-control-lg" placeholder="Product Name" value="{{ old('productName') }}">
                @error('productName')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="productPrice">Product Price:</label>
                <input type="text" id="productPrice" name="productPrice" class="form-control form-control-lg" placeholder="Product Price" value="{{ old('productPrice') }}">
                @error('productPrice')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="productPrice">Product Sizes:(comma separated values i.e. S,M or 40,41 etc)</label>
                <input type="text" id="productSize" name="productSize" class="form-control form-control-lg" placeholder="Product Sizes" value="{{ old('productSizes') }}">
                @error('productSizes')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="mainImage">Product Main Image: (The Thumbnail image)</label>
                <input type="file" class="form-control" name="mainImage" id="mainImage">
                @error('mainImage')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="multipleImages">Product Other Images (attach multiple images):</label>
                <input type="file" class="form-control" name="multipleImages[]" multiple id="multipleImages">
                @error('multipleImages')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 mt-3">
                <label for="productDescription">Product Description:</label>
                <textarea name="productDescription" id="productDescription" class="summernote">{{ old('productDescription') }}</textarea>
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

        $('#productCategory').on('change', function () {
            var categoryId = $(this).val();

            // Make an AJAX request to fetch subcategories
            $.ajax({
                url: "{{ route('admin.product.shoes.get-category-sub-categories') }}",
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


        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

    });
</script>
@endsection
