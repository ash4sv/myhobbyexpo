    @csrf
    <div class="mb-3">
        <label for="identity" class="form-label">Role</label>
        <select class="hobby-select form-select @error('role') is-invalid @enderror" name="role" id="role">
            @foreach($roles as $key => $role)
                <option value="{{ $role  }}" {{ (in_array($role, $user->roles->pluck('name')->toArray())) ? 'selected' : '' }}>{{ $role }}</option>
            @endforeach
        </select>
        @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Email verify</label>
        <input type="text" class="form-control @error('email_verified_at') is-invalid @enderror" id="email_verified_at" name="email_verified_at" value="{{ old('email_verified_at', $user->email_verified_at) }}">
        @error('email_verified_at')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-0">
        <button type="submit" class="btn btn-indigo w-100px">Save</button>
    </div>
