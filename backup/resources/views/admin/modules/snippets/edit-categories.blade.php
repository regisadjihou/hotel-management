<div class="col-6 form-group mt-2">
    <label for="productCategory">Product Category:</label>
    <select class="form-select mr-sm-2 form-control-lg" id="productCategory" name="productCategory">
        <option selected disabled>Choose...</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->title }}
            </option>
        @endforeach
    </select>
    @error('productCategory')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
