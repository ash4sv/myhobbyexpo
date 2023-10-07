@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="section" class="form-label">Section</label>
            <select class="hobby-select form-select @error('section') is-invalid @enderror" name="section" id="section">
                @foreach($sections as $key => $section)
                    <option value="{{ $section->id  }}">{{ $section->name }}</option>
                @endforeach
            </select>
            @error('section')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Booth Type</label>
            <input class="form-control @error('booth_type') is-invalid @enderror" type="text" name="booth_type" value="{{ old('booth_type', $booth->booth_type) }}" />
            @error('booth_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Normal Price</label>
            <input class="form-control @error('normal_price') is-invalid @enderror" type="text" name="normal_price" value="{{ old('normal_price', $booth->normal_price) }}" />
            @error('normal_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Early Bird Price</label>
            <input class="form-control @error('early_bird_price') is-invalid @enderror" type="text" name="early_bird_price" value="{{ old('early_bird_price', $booth->early_bird_price) }}" />
            @error('early_bird_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Early Bird Price</label>
            <input class="form-control @error('early_bird_expiry_date') is-invalid @enderror" type="text" name="early_bird_expiry_date" value="{{ old('early_bird_expiry_date', $booth->early_bird_expiry_date) }}" />
            @error('early_bird_expiry_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <div>
        <input type="checkbox" name="status" id="switchery-default" @if(old('status', $booth->status)) checked @endif/>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-12">
                <button type="button" id="selectAll" class="btn btn-indigo me-2 text-truncate mb-3 selectAll">Select All</button>
            </div>
        </div>
        <div class="row">
            @foreach($numbers as $key => $number)
                <div class="col-xl-2 col-lg-3 col-md-4 col-md-5 col-2">
                    <div class="form-check form-check-inline mb-3">
                        <span style="display:inline-block; width:28px;">{{ $loop->iteration }}.</span>
                        <input class="form-check-input selectPermission" type="checkbox" id="{{ $key }}" name="number[]" value="{{ $number->id }}" @if($edit) {{ in_array($number->id, $boothSelected) ? 'checked' : '' }} @endif />
                        <label class="form-check-label" for="{{ $number->id }}">{{ $number->booth_number }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="mb-0">
    <button type="submit" class="btn btn-success w-90px">Save</button>
    <button type="reset" class="btn btn-lime w-90px">Reset</button>
    <a href="{{ route('apps.exhibition.booth.index') }}" class="btn btn-yellow w-90px">Back</a>
</div>


@push('script')
    <script>
        var clicked = false;
        $('#selectAll').on('click', function(event) {
            $(".selectPermission").prop("checked", !clicked);
            clicked = !clicked;
            this.innerHTML = clicked ? 'Deselect' : 'Select All';
        });
    </script>
@endpush
