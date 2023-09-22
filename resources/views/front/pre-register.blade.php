@extends('front.layout.master')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow p-3 mb-5 rounded" id="pre_register">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center">Pre-Register to 5<sup>th</sup> MALAYSIA HOBBY EXPO 2023</h4>

                    <form action="{{ route('preregsubmit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name_company" class="form-label">Name of Company / Shop / Group / Club / Associate: <span class="text-danger">*</span></label>
                            <input class="form-control @error('name_company') is-invalid @enderror" type="text" name="name_company" id="name_company" />
                            @error('name_company')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="person_in_charge" class="form-label">Name of Person in Charge: <span class="text-danger">*</span></label>
                            <input class="form-control @error('person_in_charge') is-invalid @enderror" type="text" name="person_in_charge" id="person_in_charge" />
                            @error('person_in_charge')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact_no" class="form-label">Contact No.: <span class="text-danger">*</span></label>
                            <input class="form-control masked-input-phone @error('contact_no') is-invalid @enderror" type="text" name="contact_no" id="contact_no" placeholder="+6019 999 9999" />
                            @error('contact_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="interest_in" class="form-label">Your interest in?: <span class="text-danger">*</span></label>
                            <select class="form-control default-select2 @error('interest_in') is-invalid @enderror" name="interest_in" id="interest_in">
                                <option value="0">Select</option>
                                <option value="1">Participant</option>
                                <option value="2">Vendor</option>
                            </select>
                            @error('interest_in')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
