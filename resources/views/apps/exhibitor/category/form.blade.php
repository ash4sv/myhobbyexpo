@csrf
<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $category->image) }}">
    {{ $category->image }}
    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="layout_plan" class="form-label">Layout Plan</label>
    <input type="file" class="form-control @error('layout_plan') is-invalid @enderror" id="layout_plan" name="layout_plan" value="{{ old('layout_plan', $category->layout_plan) }}">
    {{ $category->layout_plan }}
    @error('layout_plan')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $category->price) }}">
    @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="table" class="form-label">Table</label>
            <input type="text" class="form-control @error('table') is-invalid @enderror" id="table" name="ffe_table" value="{{ old('table', $category->ffe_table) }}">
            @error('table')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="chair" class="form-label">Chair</label>
            <input type="text" class="form-control @error('chair') is-invalid @enderror" id="chair" name="ffe_chair" value="{{ old('chair', $category->ffe_chair) }}">
            @error('chair')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="sso" class="form-label">SSO</label>
            <input type="text" class="form-control @error('sso') is-invalid @enderror" id="sso" name="ffe_sso" value="{{ old('sso', $category->ffe_sso) }}">
            @error('sso')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-0">
    <button type="submit" class="btn btn-indigo w-100px">Save</button>
</div>
