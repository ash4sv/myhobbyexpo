@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="section" class="form-label">Section</label>
            <select class="hobby-select form-select @error('section') is-invalid @enderror" name="section" id="section">
                <option value="">Select</option>
                @foreach($sections as $key => $section)
                    <option value="{{ $section->id }}" {{ $booth->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
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
            <label class="form-label">Early Bird Price Date</label>
            <input class="form-control datepicker-auto-close @error('early_bird_expiry_date') is-invalid @enderror" type="text" name="early_bird_expiry_date" value="{{ old('early_bird_expiry_date', $booth->early_bird_expiry_date) }}" />
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
        <div class="row mb-2">
            <div class="col-md-2 col-3">
                <button type="button" id="selectAll" class="btn btn-indigo w-100 text-truncate mb-3 selectAll">Select All</button>
            </div>
            <div class="col-md-8 col-6">
                <input type="text" class="form-control" name="booth_num_filter" id="booth_num_filter" placeholder="Filter">
            </div>
            <div class="col-md-2 col-3">
                <button type="button" id="filterReset" class="btn btn-warning w-100 text-truncate mb-3 filterReset">Reset</button>
            </div>
        </div>
        <div class="row mb-2">
            @foreach($numbers as $key => $number)
                <div class="col-xl-1 col-lg-2 col-md-4 col-sm-5 col-6">
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input selectPermission" type="checkbox" id="b{{ $number->id }}" name="number[]" value="{{ $number->id }}" @if($edit) {{ in_array($number->id, $boothSelected) ? 'checked' : '' }} @endif />
                        <label class="form-check-label" for="b{{ $number->id }}">{{ $loop->iteration }}. {{ $number->booth_number }}</label>
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
        $(document).ready(function() {
            var clicked = false;
            $('#selectAll').on('click', function(event) {
                $(".selectPermission").prop("checked", !clicked);
                clicked = !clicked;
                this.innerHTML = clicked ? 'Deselect' : 'Select All';
            });


            // Initialize the list of booth numbers
            var boothNumbers = $('.form-check');

            // Filter function
            $('#booth_num_filter').on('input', function() {
                var filterValue = $(this).val().toLowerCase();

                boothNumbers.each(function() {
                    var boothLabel = $(this).find('.form-check-label').text().toLowerCase();
                    if (boothLabel.includes(filterValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Reset function
            $('#filterReset').click(function() {
                $('#booth_num_filter').val('');
                boothNumbers.show();
            });
        });
    </script>
@endpush
