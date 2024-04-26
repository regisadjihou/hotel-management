@extends('admin.layouts.master')


@section('content')
@include('admin.includes.toasters')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0" style="display: inline-block;">Categories Create Page</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.subcategory.save')}}" method="post">
                    <div class="form-group col-6">
                        <label for="">Select Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="" disabled>Choose...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 mt-3">
                        <label for="">Sub Category Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-6">
                        @csrf
                        <button class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('admin.includes.index-scripts')

@endsection
