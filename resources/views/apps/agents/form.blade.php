@csrf

<div class="mb-3">
    <label class="form-label">Hall</label>
    <select class="form-control hobby-select @error('hall') is-invalid @enderror" name="hall" id="hall">
        @foreach($halls as $key => $hall)
            <option value="{{ $key }}" {{ ($key === $agent->hall_id) ? 'selected':'' }}>{{ $hall }}</option>
        @endforeach
    </select>
    @error('hall')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Zone</label>
    <select class="form-control hobby-select @error('section') is-invalid @enderror" name="section" id="section">
        @foreach($zones as $key => $zone)
            <option value="{{ $key }}" {{ ($key === $agent->section_id) ? 'selected':'' }}>{{ $zone }}</option>
        @endforeach
    </select>
    @error('section')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $agent->name) }}" />
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" id="description" class="summernote @if('description') is-invalid @endif">{{ old('description', $agent->description) }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <div>
        <input type="checkbox" name="status" id="switchery-default" @if(old('status', $agent->status)) checked @endif/>
    </div>
    @error('status')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-success w-90px">Save</button>
    <button type="reset" class="btn btn-lime w-90px">Reset</button>
    <a href="{{ route('apps.agent.index') }}" class="btn btn-yellow w-90px">Back</a>
</div>
