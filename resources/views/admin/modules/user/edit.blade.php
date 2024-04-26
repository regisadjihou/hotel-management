@extends('admin.layouts.master')

@section('styles')
 <!-- This Page CSS -->
 <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
@endsection

@section('content')


    <form action="{{ route('admin.users.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{$staff->id}}">
        <div class="row mt-3">
            <h3>Staff Information</h3>
            <!-- ... (similar changes for other input fields) ... -->
            <div class="col-6 form-group">
                <label for="Name">Staff Member Name:</label>
                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Staff Member Full Name" value="{{ old('name',$staff->name) }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group">
                <label for="position">Staff position:</label>
                <input type="text" id="position" name="position" class="form-control form-control-lg" placeholder="Staff position" value="{{ old('position',$staff->position) }}">
                @error('position')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="salary">Staff Salary:</label>
                <input type="number" id="salary" name="salary" class="form-control form-control-lg" placeholder="Staff salary" value="{{ old('salary',$staff->salary) }}">
                @error('salary')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="gender">Staff Gender:</label>
                <input type="text" id="gender" name="gender" class="form-control form-control-lg" placeholder="Staff gender" value="{{ old('gender',$staff->gender) }}">
                @error('gender')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" class="form-control form-control-lg" placeholder="Staff Member Age" value="{{ old('age',$staff->age) }}">
                @error('age')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="phone">phone:</label>
                <input type="text" id="phone" name="phone" class="form-control form-control-lg" placeholder="Staff phone #" value="{{ old('phone',$staff->phone) }}">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Total email" value="{{ old('email',$staff->email) }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 form-group mt-3">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control " placeholder="Enter Password" value="{{ old('password') }}">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6 form-group mt-3">
                <label for="image">Staff Picture:</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="col-6 form-group mt-3">
                <label for="hired_date">Staff Hired Date:</label>
                <input type="date" id="hired_date" name="hired_date" class="form-control" placeholder="Hire Date" value="{{ old('hired_date',$staff->hired_date) }}">
                @error('hired_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-5">
            <button type="submit" class="btn btn-success" style="width:200px;margin:auto;">Update Staff Details</button>
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
