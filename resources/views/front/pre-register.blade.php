@extends('front.layout.master')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto">
            <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-4 w-xs-300px w-md-450px">

            <h4 class="text-white text-center">MALAYSIA HOBBY EXPO 2023 5<sup>th</sup> ANNIVERSARY</h4>
            <h5 class="text-white mb-4 text-center">PRE-REGISTRATION FOR EXHIBITOR ONLY</h5>

            <form action="{{ route('preregsubmit') }}" method="POST">
                @csrf
                <div class="card mb-4 shadow rounded" id="section_a">
                    <div class="card-body">

                        <h5>Section A</h5>
                        <hr class="my-10px">

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
                            <label for="group_team_members" class="form-label">For Hobby Group Association, Club, Society Only: </label>
                            <input class="form-control @error('group_team_members') is-invalid @enderror" type="text" name="group_team_members" id="group_team_members" />
                            @error('group_team_members')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-4 shadow rounded" id="section_b">
                    <div class="card-body">
                        <h5>Section B</h5>
                        <hr class="my-10px">

                        <div class="mb-3">
                            <label for="selection_in" class="form-label">Selection: <span class="text-danger">*</span></label>
                            <select class="form-control default-select2 @error('selection_in') is-invalid @enderror" name="selection_in" id="selection_in" required>
                                <option value="0">Select</option>
                                <option value="1">Selling Vendor</option>
                                <option value="2">Hobby Activity Only</option>
                                <option value="3">Hobby Show Off Only</option>
                            </select>
                            @error('selection_in')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2 title-section-size">
                            <label for="barred_size" class="form-label">Size of Lot Required? <span class="text-danger">*</span></label>
                            <p><label for="" class="form-label">Please choose:</label></p>
                        </div>

                        <div class="mb-3" id="barred_size_sec">
                            <label for="barred_size" class="form-label">Barred Size (meter): <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="barred_size[]" placeholder="Length">
                                <span class="input-group-text input-group-addon">to</span>
                                <input type="text" class="form-control" name="barred_size[]" placeholder="Width">
                            </div>
                        </div>

                        <div class="mb-3" id="shell_scheme_sec">
                            <label for="shell_scheme" class="form-label">Shell Scheme (3.0m x 3.0m): <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="shell_scheme" placeholder="">
                                <span class="input-group-text input-group-addon">Lot</span>
                            </div>
                            <div id="barredMsg" class="form-text">Came with 1 Unit Table, 2 Unit Chair, SSO 13Amp</div>
                        </div>

                        <div class="mb-3" id="bacis_lot_sec">
                            <label for="basic_lot" class="form-label">Basic Lot (2.0m  x 2.5m): <span class="text-danger">*</span></label>  {{--Only Table, Chair, and SSO 13 Amp--}}
                            <div class="input-group">
                                <input type="text" class="form-control" name="basic_lot" placeholder="">
                                <span class="input-group-text input-group-addon">Lot</span>
                            </div>
                            <div id="barredMsg" class="form-text">Only 1 Unit Table, 2 Unit Chair, SSO 13Amp</div>
                        </div>
                    </div>
                </div>

                <div class="mb-0 text-center">
                    <button type="submit" class="btn btn-indigo btn-lg w-250px">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        $(document).ready(function() {
            // Initially hide all sections
            $("#barred_size_sec, #shell_scheme_sec, #bacis_lot_sec").hide();

            // Attach a change event listener to the "Selection" dropdown
            $("#selection_in").change(function() {
                // Get the selected option value
                var selectedValue = $(this).val();

                // Hide all sections first
                $("#barred_size_sec, #shell_scheme_sec, #bacis_lot_sec").hide();

                // Show sections based on the selected value
                if (selectedValue === "1") {
                    // User selected "Selling Vendor"
                    $("#barred_size_sec, #shell_scheme_sec, #bacis_lot_sec").show();
                } else if (selectedValue === "2") {
                    // User selected "Hobby Activity Only"
                    $("#shell_scheme_sec, #bacis_lot_sec").show();
                } else if (selectedValue === "3") {
                    // User selected "Bobby Show Off Only"
                    $("#bacis_lot_sec").show();
                }
            });

            // Add input validation for numeric fields in shell_scheme_sec and bacis_lot_sec
            $("#barred_size_sec input, #shell_scheme_sec input, #bacis_lot_sec input").on("input", function() {
                // Remove non-numeric characters using a regular expression
                var sanitizedValue = $(this).val().replace(/[^0-9]/g, "");
                $(this).val(sanitizedValue);
            });
        });
    </script>
@endpush
