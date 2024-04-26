<div class="col-6 form-group mt-2">
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
