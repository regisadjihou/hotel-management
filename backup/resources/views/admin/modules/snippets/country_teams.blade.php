<div class="col-6 form-group mt-2">
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
