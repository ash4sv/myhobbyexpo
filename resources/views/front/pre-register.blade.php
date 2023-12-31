@extends('front.layout.master')

@section('page-title', 'REGISTRATION')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto mb-5">
            <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-30px img-fluid">

            <h3 class="text-white text-center"><strong>MALAYSIA HOBBY EXPO 2023 5<sup>th</sup> ANNIVERSARY</strong></h3>
            <h4 class="text-white mb-30px text-center"><strong>PRE-REGISTRATION FOR EXHIBITOR ONLY</strong></h4>

            <form action="{{ route('preregsubmit') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" data-parsley-validate="true">
                @csrf
                <div class="card mb-4 shadow rounded" id="section_a">
                    <div class="card-body">

                        <h5>Section A - Exhibitor Particulars</h5>
                        <hr class="my-10px">

                        <div class="mb-3">
                            <label for="name_company" class="form-label">Name of Company / Shop / Group / Association / Club / Society: <span class="text-danger">*</span></label>
                            <input class="form-control @error('name_company') is-invalid @enderror" type="text" name="name_company" id="name_company" required/>
                            @error('name_company')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="person_in_charge" class="form-label">Name of Person in Charge: <span class="text-danger">*</span></label>
                            <input class="form-control @error('person_in_charge') is-invalid @enderror" type="text" name="person_in_charge" id="person_in_charge" required/>
                            @error('person_in_charge')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact_no" class="form-label">Contact No.: <span class="text-danger">*</span></label>
                            <input class="form-control masked-input-phone @error('contact_no') is-invalid @enderror" type="text" name="contact_no" id="contact_no" placeholder="+6019 999 9999" required/>
                            @error('contact_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" required/>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="group_team_members" class="form-label">Group / Team Members (For Hobby Group, Association, Club, Society Only): </label>
                            <input class="form-control @error('group_team_members') is-invalid @enderror" type="text" name="group_team_members" id="group_team_members" />
                            @error('group_team_members')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-4 shadow rounded" id="section_b">
                    <div class="card-body">
                        <h5>Section B - Your Interest</h5>
                        <hr class="my-10px">

                        <div class="mb-3">
                            <label for="selection_in" class="form-label">Selection: <span class="text-danger">*</span></label>
                            <select class="form-control default-select2 @error('selection_in') is-invalid @enderror" name="selection_in" id="selection_in" data-parsley-required="true">
                                <option value="">Select</option>
                                <option value="1">Selling Vendor</option>
                                <option value="3">Hobby Show Off Only</option>
                                <option value="2">Hobby Activity Only</option>
                            </select>
                            @error('selection_in')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="tnc_selling_vendor" class="mb-3">
                            <p class="mb-2px"><strong>Only for Hobby Sales related. Open to all personal / company that want to sell hobby stuff. T&C applied.</strong></p>
                        </div>

                        <div id="tnc_hobby_activity" class="mb-3">
                            <p class="mb-2px"><strong>Only open for Hobby Group/Club / Soceity for show-off and share your hobby to audience. You are NOT ALLOW TO DO ANY SALES in this section. T&C applied.</strong></p>
                        </div>

                        <div id="tnc_hobby_show_off" class="mb-3">
                            <p class="mb-2px"><strong>This section in only for Hobby Competition / Tournament / Performance. You are NOT ALLOW TO DO ANY SALES in this section. T&C applied.</strong></p>
                        </div>

                        <div class="mb-2 title-section-size">
                            <label for="barred_size" class="form-label">Size of Lot Required? <span class="text-danger">*</span></label>
                            <p><label for="" class="form-label">Please choose:</label></p>
                        </div>

                        <div class="mb-3" id="shell_scheme_sec">
                            <label for="shell_scheme" class="form-label">Shell Scheme (3.0m x 3.0m): </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="shell_scheme" id="shell_scheme" placeholder="">
                                <span class="input-group-text input-group-addon">Lot</span>
                            </div>
                            <div id="barredMsg" class="form-text">Came with 1 Unit Table, 2 Unit Chair, SSO 13Amp</div>
                        </div>

                        <div class="mb-3" id="bacis_lot_sec">
                            <label for="basic_lot" class="form-label">Basic Lot (2.0m  x 2.5m): </label>  {{--Only Table, Chair, and SSO 13 Amp--}}
                            <div class="input-group">
                                <input type="text" class="form-control" name="basic_lot" id="basic_lot" placeholder="">
                                <span class="input-group-text input-group-addon">Lot</span>
                            </div>
                            <div id="barredMsg" class="form-text">Only 1 Unit Table, 2 Unit Chair, SSO 13Amp</div>
                        </div>

                        <div class="mb-3" id="barred_size_sec">
                            <label for="bare_size" class="form-label">Bare Space Size (meter): </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="bare_size[]" placeholder="Length">
                                <span class="input-group-text input-group-addon">to</span>
                                <input type="text" class="form-control" name="bare_size[]" placeholder="Width">
                            </div>
                        </div>

                        <div class="mb-3" id="item_for_showoff">
                            <label for="anw_item_for_sale" class="form-label">Describe what you want to show-off in the box below: <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('anw_item_for_showoff') is-invalid @enderror" name="anw_item_for_showoff" id="anw_item_for_showoff" cols="30" rows="5"></textarea>
                        </div>

                        <div class="mb-3" id="item_for_sale">
                            <label for="anw_item_for_sale" class="form-label">Describe your item for sale: <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('anw_item_for_sale') is-invalid @enderror" name="anw_item_for_sale" id="anw_item_for_sale" cols="30" rows="5"></textarea>
                        </div>

                        <div class="mb-3" id="activities_explain">
                            <label for="anw_activities_explain" class="form-label">Describe your activity, how many expected participant, etc. in the box below: <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('anw_activities_explain') is-invalid @enderror" name="anw_activities_explain" id="anw_activities_explain" cols="30" rows="5"></textarea>
                        </div>

                        <div class="mb-3" id="activities_pic">
                            <label for="anw_activities_pic" class="form-label activity_label">Attach activities photos: <span class="text-danger">*</span></label>
                            <label for="anw_activities_pic" class="form-label hobby_label">Attach Hobby Group TT, Gathering photos: <span class="text-danger">*</span></label>
                            <input class="form-control @error('anw_activities_pic') is-invalid @enderror" type="file" name="anw_activities_pic[]" id="anw_activities_pic" multiple />
                            <div id="barredMsg" class="form-text">Please upload your activities events photos. Maximum 6 images and 2MB</div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 shadow rounded" id="section_b">
                    <div class="card-body">
                        <h5>Section C - Sponsorship</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="name_company" class="form-label mb-3">Interested to become MHX 2023 sponsors? <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-4 col-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="become_sponsors" id="become_sponsors_yes" value="1">
                                        <label class="form-check-label" for="become_sponsors_yes">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="become_sponsors" id="become_sponsors_no" value="0" checked>
                                        <label class="form-check-label" for="become_sponsors_no">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('become_sponsors_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @foreach ($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach

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
            $('form').parsley();
            // Initially hide all sections
            $("#barred_size_sec, #shell_scheme_sec, #bacis_lot_sec, #tnc_selling_vendor, #tnc_hobby_activity, #tnc_hobby_show_off, #item_for_sale, #activities_explain, #activities_pic, #item_for_showoff, .activity_label, .hobby_label").hide();

            // Attach a change event listener to the "Selection" dropdown
            $("#selection_in").change(function () {
                // Get the selected option value
                var selectedValue = $(this).val();

                // Hide Parsley error messages
                $('form').parsley().reset();

                // Hide all sections first and remove 'required' attribute
                $("#barred_size_sec, #shell_scheme_sec, #bacis_lot_sec, #tnc_selling_vendor, #tnc_hobby_activity, #tnc_hobby_show_off, #item_for_sale, #activities_explain, #activities_pic, #item_for_showoff, .activity_label, .hobby_label").hide();
                $("#shell_scheme, #basic_lot, #anw_item_for_sale, #anw_activities_explain, #anw_activities_pic, #anw_item_for_showoff, input[name*='bare_size']").prop('required', false);
                $("#shell_scheme, #basic_lot, #anw_item_for_sale, #anw_activities_explain, #anw_activities_pic, #anw_item_for_showoff, input[name*='bare_size']").removeClass('parsley-error');

                // Show sections based on the selected value
                if (selectedValue === "1") {
                    // User selected "Selling Vendor"
                    $("#barred_size_sec, #shell_scheme_sec, #bacis_lot_sec, #tnc_selling_vendor, #item_for_sale").show();
                    $("#anw_item_for_sale").attr("required", true)
                } else if (selectedValue === "2") {
                    // User selected "Hobby Activity Only"
                    $("#barred_size_sec, #tnc_hobby_activity, #activities_explain, #activities_pic, .activity_label").show();
                    $('#anw_activities_explain, #anw_activities_pic').attr("required", true);
                } else if (selectedValue === "3") {
                    // User selected "Bobby Show Off Only"
                    $("#barred_size_sec, #tnc_hobby_show_off, #item_for_showoff, #activities_pic, .hobby_label").show();
                    $("#anw_item_for_showoff, #anw_activities_pic").attr("required", true);
                }
            });

            // Add input validation for numeric fields in shell_scheme_sec and bacis_lot_sec
            $("#barred_size_sec input, #shell_scheme_sec input, #bacis_lot_sec input, #contact_no").on("input", function() {
                // Remove non-numeric characters using a regular expression
                var sanitizedValue = $(this).val().replace(/[^0-9]/g, "");
                $(this).val(sanitizedValue);
            });

            // Define the maximum number
            var maxNumber = 99999999999999999999; // Change this to your desired maximum number

            // Add an event listener to the input field
            $("#contact_no").on("input", function () {
                var inputVal = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters
                if (inputVal.length > 0) {
                    // If the input value is greater than the maximum number, truncate it
                    if (parseInt(inputVal) > maxNumber) {
                        inputVal = inputVal.substring(0, 10); // Keep only the first 10 digits
                    }
                    $(this).val(inputVal); // Set the input value
                }
            });
        });
    </script>
@endpush
