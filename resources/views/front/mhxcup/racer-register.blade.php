@extends('front.layout.mini4wp-master')

@section('title-mini4wd', 'Racer Details')

@section('page-minicup')
    <div class="container p-sm-5 p-3">
        <h2 class="text-center mt-sm-0 mb-sm-5 mt-4 mb-5 font-weight-700 text-uppercase">{{ $category['category'] }}</h2>

        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('mhxcup.registerPost') }}" method="POST" id="racer_register" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4" id="section_a">
                        <div class="card-body">
                            @if($category['category'] == 'semi-tech class a')
                            <img src="{{ asset('assets/upload/semi-tech-layout.jpeg') }}" alt="" class="img-fluid">
                            @elseif($category['category'] == 'b-max class b')
                            <img src="{{ asset('assets/upload/b-max-layout.jpeg') }}" alt="" class="img-fluid">
                            @else
                            <img src="{{ asset('assets/upload/stock-layout.jpeg') }}" alt="" class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <div class="card mb-4" id="section_a">
                        <div class="card-body">

                            <h5 class="font-weight-700">Section A - Racer Particular</h5>
                            <hr class="my-10px">

                            <input type="hidden" name="category" value="{{ $category['category'] }}" class="form-control mb-3" readonly>
                            <input type="hidden" name="price_category" value="{{ $category['price_category'] }}" class="form-control mb-3" readonly>

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="full_name" value="{{ old('full_name') }}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label for="identification_card_number" class="form-label">Identification Card Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="identification_card_number" value="{{ old('identification_card_number') }}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="phone_number" value="{{ old('phone_number') }}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="" name="email" value="{{ old('email') }}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label for="nickname" class="form-label">Nickname <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="nickname" value="{{ old('nickname') }}">
                                <div id="" class="form-text">
                                    Not more than 5 character, alphabet only, to be use as Called Up name.
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-0">
                                <label for="team_group" class="form-label">Team / Group</label>
                                <input type="text" class="form-control" id="" name="team_group" value="{{ old('team_group') }}">
                                <div id="" class="form-text">
                                    If not applicable, please write NA.
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-4" id="section_b">
                        <div class="card-body">
                            <h5 class="font-weight-700">Section B - Race Fee</h5>
                            <hr class="my-10px">

                            <div class="mb-3">
                                <label for="registrationSlot" class="form-label">Please select your registration slot</label>
                                <select name="registration" id="registrationSlot" class="form-control">
                                    <option value="">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                </select>
                                <div class="invalid-feedback"></div>
                                <div id="" class="form-text">
                                    RM{{ $category['price_category'] }} per registration
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($category['category'] == 'semi-tech class a' || $category['category'] == 'b-max class b')
                    <div class="card mb-4" id="section_c">
                        <div class="card-body">
                            <h5 class="font-weight-700">Section C - Merchandise</h5>
                            <hr class="my-10px">

                            <div id="merchandise_">

                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="total_cost" class="form-label">
                                    Please remit the below total in RM, using bank transfer to <br>

                                    MAYBANK, INFINITY PULSE SDN BHD, <a id="copyLink" href="">564810562363</a>  <input type="hidden" value="564810562363" id="textToCopy">
                                </label>
                                <input type="text" name="total_cost" value="" class="form-control mb-3" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="receipt" class="form-label">Please upload the receipt of payment <span class="text-danger">*</span></label>
                                <input type="file" name="receipt" id="" class="form-control">
                                <div id="" class="form-text">
                                    This method is temporary, it will update with the direct payment
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <p class="mb-0 text-center">By clicking <strong>"Proceed to Pay"</strong>, I hereby agree and consent to the <a target="_blank" href="{{ asset('assets/upload/mhx2023_events-tnc.pdf') }}">Terms & Conditions</a> of the event.</p>
                            </div>

                            <div class="mb-0 text-center">
                                <button type="submit" class="btn btn-red btn-lg w-300px text-white">
                                    Proceed
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('onpagescript')
    <script>
        $(document).ready(function () {
            $("#section_c").hide();

            // Initialize Select2 for the initial registration slot selection
            $("#registrationSlot").select2();

            // Create an object to store the validation rules and messages
            var validationRules = {
                full_name: {
                    required: true
                },
                identification_card_number: {
                    required: true
                },
                phone_number: {
                    required: true
                },
                email: {
                    required: true
                },
                nickname: {
                    required: true
                },
                registration: {
                    required: true
                },
                receipt: {
                    required: true
                }
            };

            var validationMessages = {
                full_name: "Please provide a full name.",
                identification_card_number: "Please provide identification card number.",
                phone_number: "Please provide a phone number.",
                email: "Please provide a valid email address.",
                nickname: "Please provide a nickname.",
                registration: "Please select your registration.",
                receipt: "Please upload the receipt here."
            };

            // Initialize form validation
            $('#racer_register').validate({
                errorElement: "span",
                errorClass: "is-invalid",
                rules: validationRules,
                messages: validationMessages,
                errorPlacement: function (error, element) {
                    error.appendTo(element.closest(".form-control").siblings(".invalid-feedback"));
                }
            });


            // Function to initialize Select2 for merchandise options with 100% width
            function initializeSelect2ForMerchandise() {
                for (var i = 0; i < 10; i++) { // Assuming a maximum of 10 merchandise options
                    $("#merchandise_" + i).select2({
                        width: '100%' // Set width to 100%
                    });
                }
            }

            // Listen for changes in the registration slot selection
            $("#registrationSlot").change(function () {
                // Get the selected quantity
                var selectedQuantity = parseInt($(this).val()); // Convert to integer

                // Clear the existing merchandise options
                $("#merchandise_").empty();

                // Clear the Section C - Merchandise
                $("#section_c").empty();

                // Add the Section C - Merchandise structure
                $("#section_c").append(
                    '<div class="card-body">' +
                    '<h5 class="font-weight-700">Section C - Merchandise</h5>' +
                    '<hr class="my-10px">' +
                    '<div id="merchandise_"></div>' +
                    '</div>'
                );

                // Add merchandise options based on the selected quantity
                for (var i = 0; i < selectedQuantity; i++) {
                    var divWrapper = (i === selectedQuantity - 1) ? '<div class="mb-0">' : '<div class="mb-3">';

                    $("#merchandise_").append(
                        divWrapper +
                        '<label for="merchandise_' + i + '" class="form-label">Select your shirt size ' + (i + 1) + '</label>' +
                        '<select id="merchandise_' + i + '" class="form-control default-select2" name="merchandises[' + i + ']">' +
                        '<option value="">Select an option</option>' +  // Add an empty option for validation
                        '<option value="s">S</option>' +
                        '<option value="m">M</option>' +
                        '<option value="l">L</option>' +
                        '<option value="xl">XL</option>' +
                        '<option value="xxl">XXL (2XL)</option>' +
                        '<option value="xxxl">XXXL (3XL)</option>' +
                        '<option value="xxxxl">XXXXL (4XL)</option>' +
                        '<option value="xxxxxl">XXXXXL (5XL)</option>' +
                        '</select>' +
                        '</div>'
                    );
                }

                // Initialize Select2 for merchandise options with 100% width
                initializeSelect2ForMerchandise();

                // Calculate the total cost and update the input field
                var priceCategory = parseFloat($("[name='price_category']").val()); // Convert to float
                var totalCost = selectedQuantity * priceCategory;
                $("[name='total_cost']").val(totalCost); // Update the total cost input field

                // Show Section C - Merchandise when the user selects a quantity
                $("#section_c").show();
            });

            // Add custom validation method to ensure at least one merchandise option is selected
            $.validator.addMethod("select2Required", function (value, element) {
                return value !== null && value !== "";
            }, "Please select at least one merchandise option.");

            // Apply the custom validation method to the dynamically added select elements
            for (var i = 0; i < 10; i++) { // Assuming a maximum of 10 merchandise options
                $('#racer_register').validate().settings.rules["merchandise_" + i] = {
                    select2Required: true
                };
                $('#racer_register').validate().settings.messages["merchandise_" + i] = {
                    select2Required: "Please select at least one merchandise option for Team / Group " + (i + 1)
                };
            }

            // Initialize Select2 for merchandise options initially
            initializeSelect2ForMerchandise();

            // ============================================================

            // Initialize Clipboard.js
            var clipboard = new ClipboardJS('#copyLink', {
                text: function() {
                    return document.getElementById('textToCopy').value;
                }
            });

            // Prevent the link's default behavior (page refresh)
            document.getElementById('copyLink').addEventListener('click', function (e) {
                e.preventDefault();
            });

            // Add a success event listener
            clipboard.on('success', function(e) {
                console.log('Text copied to clipboard: ' + e.text);
                e.clearSelection();
            });

            // Add an error event listener
            clipboard.on('error', function(e) {
                console.error('Copy to clipboard failed: ' + e.action);
            });
        });
    </script>
@endpush
