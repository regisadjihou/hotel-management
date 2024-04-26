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
                <label for="leagueOrCountry">League Or Country:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="leagueOrCountry" name="leagueOrCountry">
                    <option selected disabled>Choose...</option>
                    <option value="league" {{ old('leagueOrCountry') == 'league' ? 'selected' : '' }}>League</option>
                    <option value="country" {{ old('leagueOrCountry') == 'country' ? 'selected' : '' }}>Country</option>
                </select>
                @error('leagueOrCountry')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-2" id="leagueSection" style="display: none;">
                <label for="league">League:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="league" name="league">
                    <option selected disabled>Choose...</option>
                    @foreach($leagues as $league)
                        <option value="{{ $league->id }}" {{ old('league') == $league->id ? 'selected' : '' }}>
                            {{ $league->title }}
                        </option>
                    @endforeach
                </select>
                @error('league')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-2" id="teamSection" style="display: none;">
                <label for="team">Team:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="team" name="team" style="width: 100%; height:36px;">
                    <option selected disabled>Choose...</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('team') == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @error('team')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-2" id="countrySection" style="display: none;">
                <label for="country">Country:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="country" name="country">
                    <option selected disabled>Choose...</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                @error('country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-2" id="countryTeamSection" style="display: none;">
                <label for="countryTeam">Country Team:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="countryTeam" name="countryTeam" style="width: 100%; height:36px;">
                    <option selected disabled>Choose...</option>
                    @foreach($country_teams as $team)
                        <option value="{{ $team->id }}" {{ old('countryTeam') == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @error('countryTeam')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Main Category i.e. Clothing, footwear etc -->
            <div class="col-6 form-group mt-2">
                <label for="productCategory">Product Category:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="productCategory" name="productCategory">
                    <option selected disabled>Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('productCategory') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('productCategory')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-2">
                <label for="productSubCategory">Product Sub Category:</label>
                <select class="form-select mr-sm-2 form-control-lg" id="productSubCategory" name="productSubCategory">
                    <option selected disabled>Choose...</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" {{ old('productSubCategory') == $sub_category->id ? 'selected' : '' }}>
                            {{ $sub_category->title }}
                        </option>
                    @endforeach
                </select>
                @error('productSubCategory')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
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
                <input type="text" id="productPrice" name="productPrice" class="form-control form-control-lg" placeholder="Product Price" value="{{ old('productPrice') }}">
                @error('productPrice')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="productPrice">Product Sizes:</label>
                <input type="text" id="productSize" name="productSize" class="form-control form-control-lg" placeholder="Product Sizes" value="{{ old('productSizes') }}">
                @error('productSizes')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="productCustomItems">Product Custom Items:</label>
                <input type="text" id="productCustomItems" name="productCustomItems" class="form-control form-control-lg" placeholder="Product Custom Items" value="{{ old('productCustomItems') }}">
                @error('productCustomItems')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="productQuantity">Product Quantity:</label>
                <input type="number" id="productQuantity" name="productQuantity" class="form-control form-control-lg" placeholder="Product Quantity" value="{{ old('productQuantity') }}">
                @error('productQuantity')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="mainImage">Product Main Image:</label>
                <input type="file" class="form-control" name="mainImage" id="mainImage">
                @error('mainImage')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="multipleImages">Product Other Images (attach multiple images):</label>
                <input type="file" class="form-control" name="multipleImages[]" multiple id="multipleImages">
                @error('multipleImages')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-12">
                <label for="productDescription">Product Description</label>
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
        $("#leagueOrCountry").change(function () {
            var selection = $(this).val();
            $("#leagueSection, #teamSection, #countrySection, #countryTeamSection").hide();

            if (selection === "league") {
                $("#leagueSection, #teamSection").show();
            } else if (selection === "country") {
                $("#countrySection, #countryTeamSection").show();
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
