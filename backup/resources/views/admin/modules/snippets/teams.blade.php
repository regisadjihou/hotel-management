<div class="col-6 form-group mt-2">
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
