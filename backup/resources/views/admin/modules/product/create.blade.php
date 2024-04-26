@extends('admin.layouts.master')

@section('styles')
 <!-- This Page CSS -->
 <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
@endsection

@section('content')


    <form action="{{ route('admin.product.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 form-group mt-2">
                <label for="leagueOrCountry">League Or Country:(whether the team is of league or country)</label>
                <select class="form-select mr-sm-2 form-control-lg" id="leagueOrCountry" name="leagueOrCountry">
                    <option selected disabled>Choose...</option>
                    <option value="league" {{ old('leagueOrCountry') == 'league' ? 'selected' : '' }}>League</option>
                    <option value="country" {{ old('leagueOrCountry') == 'country' ? 'selected' : '' }}>Country</option>
                </select>
                @error('leagueOrCountry')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row" id="leagueTeamSection">

                @include('admin.modules.snippets.leagues',['leagues' => $leagues])
                @include('admin.modules.snippets.teams',['teams' => $teams])
            </div>


            <div class="row" id="countryTeamSection">
                @include('admin.modules.snippets.countries',['countries' => $countries])
                @include('admin.modules.snippets.country_teams',['country_teams' => $country_teams])
            </div>

            <!-- Main Category i.e. Clothing, footwear etc -->
            @include('admin.modules.snippets.categories')
            @include('admin.modules.snippets.sub_categories')

        </div>
        <hr>
        <div class="row mt-3">
            <h3>Product Information</h3>
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
                <input type="text" id="productPrice" name="productPrice" class="form-control form-control-lg" placeholder="Product Price" value="{{ old('productPrice','29.99') }}">
                @error('productPrice')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="col-6 form-group mt-3">
                <label for="productPrice">Product Sizes:(comma separated values i.e. S,M or 40,41 etc)</label>
                <input type="text" id="productSize" name="productSize" class="form-control form-control-lg" placeholder="Product Sizes" value="{{ old('productSizes') }}">
                @error('productSizes')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}
            <div class="col-6 form-group mt-3">
                <label for="productPrice">Product Sizes:(comma separated values i.e. S,M or 40,41 etc)</label>
                {{-- <input type="text" id="productSize" name="productSize" class="form-control form-control-lg" placeholder="Product Sizes" value="{{ old('productSizes') }}"> --}}
                    <select name="productSize" id="productSize" required>
                        <option value="S,M,L,XL,XXL">S,M,L,XL,XXL</option>
                        <option value="S,M,L,XL,XXL,3XL,4XL">S,M,L,XL,XXL,3XL,4XL</option>
                        <option value="16(2-3Y),18(4-5Y),20(5-6Y),22(7-8Y),24(8-9Y),26(10-11Y),28(12-13Y)">16(2-3Y),18(4-5Y),20(5-6Y),22(7-8Y),24(8-9Y),26(10-11Y),28(12-13Y)</option>
                    </select>
                @error('productSizes')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="productCustomItems">Product Custom Items:</label>
                <input type="text" id="productCustomItems" name="productCustomItems" class="form-control form-control-lg" placeholder="Product Custom Items" value="{{ old('productCustomItems','Yes') }}">
                @error('productCustomItems')
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
        $("#leagueTeamSection").hide();
        $("#countryTeamSection").hide();
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
</script>
@endsection
