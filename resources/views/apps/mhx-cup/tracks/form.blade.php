@csrf
<div class="mb-3">
    <label for="racing_categories_id" class="form-label">Racing Categories</label>
    <select name="racing_categories_id" id="racing_categories_id" class="form-control hobby-select">
        @foreach($categories as $key => $category)
            <option value="{{ $category->id }}" {{ ($category->id === $track->racing_categories_id) ? 'selected':'' }}>{{ $category->category_name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="track_name" class="form-label">Track Name</label>
    <input type="text" name="track_name" id="track_name" class="form-control" value="{{ old('track_name', $track->track_name) }}">
</div>
<div class="mb-3">
    <label for="track_layouts" class="form-label">Track Layouts</label>
    <div class="input-group">
        <input type="file" name="track_layouts" id="track_layouts" class="form-control" value="{{ old('track_layouts', $track->track_layouts) }}">
        <a data-fancybox data-src="{{ asset($track->track_layouts) }}" data-caption="" href="" class="btn btn-outline-secondary">
            View Image
        </a>
    </div>
</div>
<div class="mb-0">
    <button type="submit" class="btn btn-success w-90px">Save</button>
    <button type="reset" class="btn btn-lime w-90px">Reset</button>
    <a href="{{ route('apps.event-mhx-cup.tracks.index') }}" class="btn btn-yellow w-90px">Back</a>
</div>
