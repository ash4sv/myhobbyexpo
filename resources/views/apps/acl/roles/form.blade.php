    @csrf
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
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
            @foreach($permissions as $key => $permission)
                <div class="col-xl-2 col-lg-3 col-md-4 col-md-5 col-2">
                    <div class="form-check form-check-inline mb-3">
                        <span style="display:inline-block;">{{ $loop->iteration }}.</span>
                        <input class="form-check-input selectPermission" type="checkbox" id="{{ $key }}" name="permissions[]" value="{{$permission}}" @if($edit) {{ in_array($key, $rolePermissions) ? 'checked' : '' }} @endif />
                        <label class="form-check-label" for="{{ $key }}">{{ $permission }}</label>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <input type="submit" class="btn btn-indigo w-100px" value="Save">
        </div>
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
