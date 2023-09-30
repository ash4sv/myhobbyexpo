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
            <input type="text" class="form-control @error('table') is-invalid @enderror" id="table" name="table" value="{{ old('table', $category->table) }}">
            @error('table')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="chair" class="form-label">Chair</label>
            <input type="text" class="form-control @error('chair') is-invalid @enderror" id="chair" name="chair" value="{{ old('chair', $category->chair) }}">
            @error('chair')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="sso" class="form-label">SSO</label>
            <input type="text" class="form-control @error('sso') is-invalid @enderror" id="sso" name="sso" value="{{ old('sso', $category->sso) }}">
            @error('sso')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

@isset($category->numbers)
<div class="mb-3">
    <div class="table-responsive">
        <div class="mb-0">
            <a href="#" class="btn btn-sm btn-purple" id="addRow"><i class="fas fa-plus"></i></a>
        </div>

        <table id="boothsTable" class="table table-striped align-middle">
            <thead>
            <tr>
                <td width="1%" class="text-center">No.</td>
                <td>Booths Number</td>
                <td>Description</td>
                <td width="1%">Status</td>
                <td width="1%" class="text-center">#</td>
            </tr>
            </thead>
            <tbody>
            @foreach($category->numbers as $number)
            <tr>
                <td width="1%" class="text-center">1</td>
                <td><input type="text" class="form-control my-n1" name="numbers[]" id="" value="{{ $number->name }}"></td>
                <td><input type="text" class="form-control my-n1" name="booth_desp[]" id="" value="{{ $number->description }}"></td>
                <td>
                    {{--<span class="badge border px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center {{ $item->become_sponsors == 1 ? 'border-success text-success' : 'border-danger text-danger' }}">
                    <i class="fa fa-circle fs-9px fa-fw me-5px"></i> {{ $item->become_sponsors == 1 ? 'Yes' : 'No' }}
                    </span>--}}
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger my-n1 removeRow"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endisset

<div class="mb-0">
    <button type="submit" class="btn btn-indigo w-100px">Save</button>
</div>

@push('script')
    <script>
        // Wait for the document to be ready
        $(document).ready(function () {
            // Counter for numbering
            let rowNum = 1;

            $('#addRow').click(function (e) {
                e.preventDefault();
                const tbody = $('#boothsTable tbody');
                const newRow = $('<tr>');
                newRow.append(`<td class="text-center">${rowNum}</td>`);
                newRow.append('<td><input type="text" class="form-control my-n1" name="numbers[]" value=""></td>');
                newRow.append('<td><input type="text" class="form-control my-n1" name="booth_desp[]" value=""></td>');
                newRow.append('<td></td>');
                newRow.append('<td><a href="#" class="btn btn-sm btn-danger my-n1 removeRow"><i class="fas fa-trash"></i></a></td>');
                rowNum++;
                tbody.append(newRow);
            });

            // Remove a row when the "Delete" button is clicked
            $('#boothsTable').on('click', '.removeRow', function (e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            function updateRowNumbers() {
                $('#boothsTable tbody tr').each(function (index) {
                    $(this).find('td:first').text(index + 1);
                });
                rowNum = $('#boothsTable tbody tr').length + 1;
            }
        });
    </script>
@endpush
