@extends('front.layout.master')

@section('page-title', 'VENDOR REGISTRATION')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto mb-5">
            <a href="{{ route('front.register.hall', $section->hall->slug) }}">
                <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-30px img-fluid">
            </a>
        </div>
    </div>

    <div id="details">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-9">

                <form id="vendor-form" action="{{ route('front.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow-lg rounded mb-4">
                        {{--<div class="card-header bg-transparent border-bottom py-3 px-4">--}}
                            {{--<h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>--}}
                        {{--</div>--}}
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td width="33%">
                                            <p class="mb-5px">Sub Total :</p>
                                            <p class="mb-5px">Booths Number:</p>
                                            {{ $section->hall->name }}
                                            @foreach($booths as $key => $booth)
                                            <p class="mb-0">{{ $booth->sections->name }} | {{ $booth->booth_number }}</p>
                                            @endforeach
                                        </td>
                                        <td width="33%"></td>
                                        <td class="text-end">
                                            {{ $subTotal }}
                                            <input type="hidden" name="sub_total" value="{{ $subTotal }}">
                                        </td>
                                    </tr>
                                    @if($data['add_table'] || $data['add_chair'] || $data['add_sso'] || $data['add_sso_15amp'] || $data['add_steel_barricade'] || $data['add_shell_scheme_barricade'])
                                        <tr>
                                            <td colspan="3">
                                                <span class="fw-bold">Add On :</span>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_table'])
                                        <tr>
                                            <td>Table :</td>
                                            <td class="text-center">{{ $data['add_table'] }} x </td>
                                            <td class="text-end">
                                                {{ $data['table_TPrice'] }}
                                                <input type="hidden" name="add_on_table" value="{{ $data['table_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_chair'])
                                        <tr>
                                            <td>Chair : </td>
                                            <td class="text-center">{{ $data['add_chair'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['chair_TPrice'] }}
                                                <input type="hidden" name="add_on_chair" value="{{ $data['chair_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_sso'])
                                        <tr>
                                            <td>SSO (13 amp) : </td>
                                            <td class="text-center">{{ $data['add_sso'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['sso_TPrice'] }}
                                                <input type="hidden" name="add_on_sso" value="{{ $data['sso_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_sso_15amp'])
                                        <tr>
                                            <td>SSO (15 amp) : </td>
                                            <td class="text-center">{{ $data['add_sso_15amp'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['ssoamp15_TPrice'] }}
                                                <input type="hidden" name="add_on_sso_15amp" value="{{ $data['ssoamp15_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_steel_barricade'])
                                        <tr>
                                            <td>Steel Barricade : </td>
                                            <td class="text-center">{{ $data['add_steel_barricade'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['steel_barricade_TPrice'] }}
                                                <input type="hidden" name="add_on_steel_barricade" value="{{ $data['steel_barricade_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_shell_scheme_barricade'])
                                        <tr>
                                            <td>Shell Scheme Barricade : </td>
                                            <td class="text-center">{{ $data['add_shell_scheme_barricade'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['shell_scheme_barricade_TPrice'] }}
                                                <input type="hidden" name="add_on_shell_scheme_barricade" value="{{ $data['shell_scheme_barricade_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    <tr class="bg-light">
                                        <th>Total :</th>
                                        <td class="text-end" colspan="2">
                                            <span class="fw-bold">
                                                {{ $total }}
                                                <input type="hidden" name="total_val" value="{{ $total }}">
                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-lg rounded">
                        <div class="card-body">

                            <h4 class="card-title">3. Exhibitor Particulars</h4>
                            <hr class="my-10px">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Name of Company / Shop / Group / Club / Associate: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="company_name" id="company_name" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="roc_rob" class="form-label">ROC / ROB / ROC: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="roc_rob" id="roc_rob" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="person_in_charge" class="form-label">Name of Person in Charge: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="person_in_charge" id="person_in_charge" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contact_no" class="form-label">Contact No.: <span class="text-danger">*</span></label>
                                        <input class="form-control masked-input-phone" type="text" name="contact_no" id="contact_no" placeholder="6019 999 9999" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook_page" class="form-label">Facebook:</label>
                                        <input class="form-control" type="text" name="facebook_page" id="facebook_page" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Instagram:</label>
                                        <input class="form-control" type="text" name="instagram" id="instagram" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tiktok" class="form-label">TikTok:</label>
                                        <input class="form-control" type="text" name="tiktok" id="tiktok" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="other" class="form-label">Other</label>
                                        <input class="form-control" type="text" name="other" id="other" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input class="form-control" type="text" name="website" id="website" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label">Sales Agents <span class="text-danger">*</span></label>
                                        <select name="sales_agent" id="sales_agent" class="form-control @error('sales_agent') is-invalid @enderror default-select2">
                                            <option value="">Please Select Your Sales Agent</option>
                                            @foreach($sections as $section)
                                                @foreach($section->agents->where('section_id', $data['section_id']) as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"></div>
                                        @error('sales_agent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{--<div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label">Image Gathering</label>
                                        <input class="form-control" type="file" name="website" id="website" />
                                    </div>
                                </div>--}}
                            </div>

                            <div class="mb-3">
                                <p class="mb-0 text-center">By clicking <strong>"Proceed to Pay"</strong>, I hereby agree and consent to the <a data-fancybox data-type="pdf" href="{{ asset('assets/upload/mhx2023_events-tnc.pdf') }}">Terms & Conditions</a> of the event.</p>
                            </div>

                            <div class="mb-0 text-center">
                                <button type="submit" class="btn btn-indigo btn-lg w-300px">
                                    Proceed to Pay
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="terms-conditions" style="display:none; width:100%; max-width:850px;" class="p-10px">

        <embed style="width:100%; height:80vh; min-height:700px;" src="{{ asset('assets/upload/mhx2023_events-tnc.pdf') }}" type="application/pdf">

    </div>

@endsection

@push('reg-script')
    <script>
        $(document).ready(function(){
            // =============================================
            $("#contact_no").on("input", function() {
                // Remove non-numeric characters using a regular expression
                var sanitizedValue = $(this).val().replace(/[^0-9]/g, "");
                $(this).val(sanitizedValue);
            });
            // =============================================
            var maxNumber = 99999999999999; // Change this to your desired maximum number
            // =============================================
            $("#contact_no").on("input", function () {
                var inputVal = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters
                if (inputVal.length > 0) {
                    // If the input value is greater than the maximum number, truncate it
                    if (parseInt(inputVal) > maxNumber) {
                        inputVal = inputVal.substring(0, 10); // Keep only the first 10 digits
                    }
                    $(this).val(inputVal); // Set the input value
                }
                console.log(inputVal);
            });

            // =============================================
            $('#vendor-form').validate({
                errorElement: "span",
                errorClass: "is-invalid",
                rules: {
                    company_name: {
                        required: true,
                    },
                    roc_rob: {
                        required: true,
                    },
                    person_in_charge: {
                        required: true,
                    },
                    contact_no: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    sales_agent: {
                        required: true,
                    }
                },
                messages: {
                    company_name: "Please provide a valid company name.",
                    roc_rob: "Please provide a valid ROC / ROB / ROC number.",
                    person_in_charge: "Please provide a valid person in charge.",
                    contact_no: "Please provide a valid contact number.",
                    email: "Please provide a valid email address.",
                    sales_agent: "Please select a sales agent.",
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest(".form-control").siblings(".invalid-feedback"));
                }
            });
        });
    </script>
@endpush
