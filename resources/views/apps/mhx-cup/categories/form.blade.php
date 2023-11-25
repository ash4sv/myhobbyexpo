@csrf
<div class="mb-3">
    <label for="category_name" class="form-label">Category Name</label>
    <input type="text" name="category_name" id="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}">
</div>
<div class="mb-3">
    <label for="category_image" class="form-label">Category Image</label>
    <div class="input-group">
        <input type="file" name="category_image" id="category_image" class="form-control" value="{{ old('category_image', $category->category_image) }}">
        <a data-fancybox data-src="{{ asset($category->category_image) }}" data-caption="" href="" class="btn btn-outline-secondary">
            View Image
        </a>
    </div>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-success w-90px">Save</button>
    <button type="reset" class="btn btn-lime w-90px">Reset</button>
    <a href="{{ route('apps.event-mhx-cup.categories.index') }}" class="btn btn-yellow w-90px">Back</a>
</div>
