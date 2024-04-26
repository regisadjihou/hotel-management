<div class="col-6 form-group mt-2">
    <label for="country">Country:</label>
    <select class="form-select mr-sm-2 form-control-lg" id="country" name="country">
        <option selected disabled>Choose...</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ $product->country_id == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
        @endforeach
    </select>
    @error('country')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
