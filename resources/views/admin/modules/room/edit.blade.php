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


    <form action="{{ route('admin.rooms.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$room->id}}">
        <div class="row">
            <h3>Room Information</h3>
            <!-- ... (similar changes for other input fields) ... -->
            <div class="col-6 form-group">
                <label for="Name"> Name:</label>
                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Room Name" value="{{ old('name',$room->name) }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="price">Room Price:</label>
                <input type="number" id="price" name="price" class="form-control form-control-lg" placeholder="Room Price" value="{{ old('price',$room->price) }}" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="number">Room Number:</label>
                <input type="number" id="number" name="number" class="form-control form-control-lg" placeholder="Room Number" value="{{ old('number',$room->number) }}" required>
                @error('number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="type">Room Type:</label>
                <input type="text" id="type" name="type" class="form-control form-control-lg" placeholder="Room Type" value="{{ old('type',$room->type) }}" required>
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="adults">Adults:</label>
                <input type="number" id="adults" name="adults" class="form-control form-control-lg" placeholder="Total Adults Capacity" value="{{ old('adults',$room->adults) }}" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="children">Children:</label>
                <input type="number" id="children" name="children" class="form-control form-control-lg" placeholder="Total Children Capacity" value="{{ old('children',$room->children) }}" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="beds">Beds:</label>
                <input type="number" id="beds" name="beds" class="form-control form-control-lg" placeholder="Total Beds" value="{{ old('beds',$room->beds) }}" required>
                @error('beds')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="baths">Bathrooms:</label>
                <input type="number" id="baths" name="baths" class="form-control form-control-lg" placeholder="Total Bathrooms" value="{{ old('baths',$room->baths) }}" required>
                @error('baths')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 form-group mt-3 position-relative">
                <div class="image-container mb-2 position-relative">
                    <img src="{{ asset('room_images/' . $room->thumb) }}" alt="">
                    <div class="cross-icon" onclick="deleteImage('{{ $room->id }}')">
                        <i class="fas fa-times fa-2x"></i>
                    </div>
                </div>
                <label for="thumb">Room Main Image: (The Thumbnail image)</label>
                <input type="file" class="form-control" name="thumb" id="thumb">
                @error('thumb')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 form-group mt-3">
                <div class="image-container-multiple mb-2 position-relative">
                    @foreach($room->images as $image)
                        <div class="image-item">
                            <img src="{{ asset('room_images/' . $image->image) }}" alt="">
                            <div class="cross-icon-multiple" data-image-id="{{ $image->id }}" onclick="deleteMultipleImage('{{ $image->id }}')">
                                <i class="fas fa-times fa-2x"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <label for="multipleImages">Room Other Images (attach multiple images):</label>
                <input type="file" class="form-control" name="multipleImages[]" multiple id="multipleImages">
                @error('multipleImages')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-12 mt-3">
                <label for="description">Room Description:</label>
                <textarea name="description" id="description" class="summernote">{{ old('description',$room->description) }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <button type="submit" class="btn btn-primary">Update Room Details</button>
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
    function deleteImage(roomId) {
        if (confirm("Are you sure you want to delete this image?")) {
            // Make an AJAX request to delete the image
            $.ajax({
                url: "{{route('admin.rooms.image-delete')}}", // Change this to your Laravel route
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { roomId: roomId },
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
                url: "{{route('admin.rooms.image-multiple-delete')}}", // Change this to your Laravel route
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
