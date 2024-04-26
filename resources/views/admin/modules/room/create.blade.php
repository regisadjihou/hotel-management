@extends('admin.layouts.master')

@section('styles')
 <!-- This Page CSS -->
 <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
@endsection

@section('content')


    <form action="{{ route('admin.rooms.save') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mt-3">
            <h3>Room Information</h3>
            <!-- ... (similar changes for other input fields) ... -->
            <div class="col-6 form-group">
                <label for="Name"> Name:</label>
                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Room Name" value="{{ old('name') }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="price">Room Price:</label>
                <input type="number" id="price" name="price" class="form-control form-control-lg" placeholder="Room Price" value="{{ old('price') }}" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="number">Room Number:</label>
                <input type="number" id="number" name="number" class="form-control form-control-lg" placeholder="Room Number" value="{{ old('number') }}" required>
                @error('number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="type">Room Type:</label>
                <input type="text" id="type" name="type" class="form-control form-control-lg" placeholder="Room Type" value="{{ old('type') }}" required>
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="adults">Adults:</label>
                <input type="number" id="adults" name="adults" class="form-control form-control-lg" placeholder="Total Adults Capacity" value="{{ old('adults') }}" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="children">Children:</label>
                <input type="number" id="children" name="children" class="form-control form-control-lg" placeholder="Total Children Capacity" value="{{ old('children') }}" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="beds">Beds:</label>
                <input type="number" id="beds" name="beds" class="form-control form-control-lg" placeholder="Total Beds" value="{{ old('beds') }}" required>
                @error('beds')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="baths">Bathrooms:</label>
                <input type="number" id="baths" name="baths" class="form-control form-control-lg" placeholder="Total Bathrooms" value="{{ old('baths') }}" required>
                @error('baths')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="thumb">Room Main Image: (The Thumbnail image)</label>
                <input type="file" class="form-control" name="thumb" id="thumb">
                @error('thumb')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="multipleImages">Room Other Images (attach multiple images):</label>
                <input type="file" class="form-control" name="multipleImages[]" multiple id="multipleImages">
                @error('multipleImages')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 mt-3">
                <label for="description">Room Description:</label>
                <textarea name="description" id="description" class="summernote">{{ old('description') }}</textarea>
                @error('productDescription')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <button type="submit" class="btn btn-success">Save Room Details</button>
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

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

    });
</script>
@endsection
