@csrf

<div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $hall->name) }}" />
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" id="description" class="summernote @if('description') is-invalid @endif">{{ old('description', $hall->description) }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Poster</label>
    <div class="input-group">
        <input class="form-control" type="file" name="image" value="{{ old('image', $hall->poster) }}" />
        <a data-fancybox data-src="{{ asset($hall->poster) }}" data-caption="Booths Type" href="" class="btn btn-outline-secondary">
            View Poster
        </a>
    </div>
    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Status</label>
            <div>
                <input type="checkbox" name="status" id="switchery-default" @if(old('status', $hall->status)) checked @endif/>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Coming Soon</label>
            <div>
                <input type="checkbox" name="coming_soon" id="switchery-default2" @if(old('status', $hall->coming_soon)) checked @endif/>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-success w-90px">Save</button>
    <button type="reset" class="btn btn-lime w-90px">Reset</button>
    <a href="{{ route('apps.exhibition.hall.index') }}" class="btn btn-yellow w-90px">Back</a>
</div>

