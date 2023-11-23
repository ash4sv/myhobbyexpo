@extends('front.layout.master')

@section('page-title', 'VENDOR ADD ON ORDER')

@section('reg-form')

    <div id="" class="dynamic-section">
        <div class="row justify-content-center py-5">
            <div class="col-md-4">
                <div class="card shadow-lg rounded">
                    <div class="card-body">

                        <form id="search-inv">
                            <div class="mb-3">
                                <label class="form-label">Invoice Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="invoice" required>
                            </div>
                            <div class="mb-0 text-center">
                                <input class="btn btn-indigo btn-lg w-300px" type="submit" value="Search">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4 pb-5">
            <div id="fieldAp" class="col-md-9">

            </div>
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        $(document).ready(function () {
            let invoice;

            // Function to append additional furniture, fixtures, and equipment to the specified HTML tag
            function appendAdditionalFurniture(data) {
                // Extracting relevant data
                const furnitureData = JSON.parse(data.inv.inv_description);

                // HTML template for additional furniture
                const furnitureHTML = `
                    <div class="card mb-4 shadow-lg rounded">
                        <div class="card-body">
                            <h4 class="card-title">1. Additional Furniture, Fixtures and Equipment</h4>
                            <hr class="my-10px">
                            <div class="row">
                                <!-- Table -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Table (RM 45.00 / Unit)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="RM 45.00" id="table_TPrice" name="table_TPrice" readonly>
                                            <input type="hidden" name="add_on_table" id="add_on_table" value="${furnitureData.add_on_table}">
                                            <select name="add_table" id="add_table" class="form-control">
                                                ${generateOptions(furnitureData.add_table)}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chair -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Chair (RM 9.00 / Unit)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="RM 9.00" id="chair_TPrice" name="chair_TPrice" readonly>
                                            <input type="hidden" name="add_on_chair" id="add_on_chair" value="${furnitureData.add_on_chair}">
                                            <select name="add_chair" id="add_chair" class="form-control">
                                                ${generateOptions(furnitureData.add_chair)}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- SSO (13 amp) -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">SSO (13 amp) (RM 70.00 / Point)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="RM 70.00" id="sso_TPrice" name="sso_TPrice" readonly>
                                            <input type="hidden" name="add_on_sso" id="add_on_sso" value="${furnitureData.add_on_sso}">
                                            <select name="add_sso" id="add_sso" class="form-control">
                                                ${generateOptions(furnitureData.add_sso)}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- SSO (15 amp) -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">SSO (15 amp) (RM 150.00 / Point)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="RM 150.00" id="ssoamp15_TPrice" name="ssoamp15_TPrice" readonly>
                                            <input type="hidden" name="add_on_sso_15amp" id="add_on_sso_15amp" value="${furnitureData.add_on_sso_15amp}">
                                            <select name="add_sso_15amp" id="add_sso_15amp" class="form-control">
                                                ${generateOptions(furnitureData.add_sso_15amp)}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Steel Barricade -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Steel Barricade (RM 55.00 / Unit)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="RM 55.00" id="steel_barricade_TPrice" name="steel_barricade_TPrice" readonly>
                                            <input type="hidden" name="add_on_steel_barricade" id="add_on_steel_barricade" value="${furnitureData.add_on_steel_barricade}">
                                            <select name="add_steel_barricade" id="add_steel_barricade" class="form-control">
                                                ${generateOptions(furnitureData.add_steel_barricade)}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Shell Scheme Barricade -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Shell Scheme Barricade (RM 35.00 / meter)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="RM 35.00" id="shell_scheme_barricade_TPrice" name="shell_scheme_barricade_TPrice" readonly>
                                            <input type="hidden" name="add_on_shell_scheme_barricade" id="add_on_shell_scheme_barricade" value="${furnitureData.add_on_shell_scheme_barricade}">
                                            <select name="add_shell_scheme_barricade" id="add_shell_scheme_barricade" class="form-control">
                                                ${generateOptions(furnitureData.add_shell_scheme_barricade)}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Append the furniture HTML to the specified tag
                $('#fieldAp').append(furnitureHTML);
            }

            // Function to generate select options based on a given value
            function generateOptions(selectedValue) {
                let optionsHTML = '';
                for (let i = 0; i <= 10; i++) {
                    optionsHTML += `<option value="${i}" ${i === selectedValue ? 'selected' : ''}>${i}</option>`;
                }
                return optionsHTML;
            }

            // Function to append exhibitor particulars to the specified HTML tag
            function appendExhibitorParticulars(data) {
                // HTML template for exhibitor particulars
                const exhibitorHTML = `
                    <div class="card mb-4 shadow-lg rounded">
                        <div class="card-body">
                            <h4 class="card-title">2. Exhibitor Particulars</h4>
                            <hr class="my-10px">
                            <div class="row">
                                <!-- Registed Company -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="staticEmail" class="form-label">Registed Company</label>
                                        <input type="text" class="form-control" value="${data.vendor.company}" readonly>
                                    </div>
                                </div>
                                <!-- Registed ROC / ROB -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="staticEmail" class="form-label">Registed ROC / ROB</label>
                                        <input type="text" class="form-control" value="${data.vendor.roc_rob}" readonly>
                                    </div>
                                </div>
                                <!-- Registed Person In-charge -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="staticEmail" class="form-label">Registed Person In-charge</label>
                                        <input type="text" class="form-control" value="${data.vendor.pic_name}" readonly>
                                    </div>
                                </div>
                                <!-- Registed Phone Number -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="staticEmail" class="form-label">Registed Phone Number</label>
                                        <input type="text" class="form-control" value="${data.vendor.phone_num}" readonly>
                                    </div>
                                </div>
                                <!-- Registed Email -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="staticEmail" class="form-label">Registed Email</label>
                                        <input type="text" class="form-control" value="${data.vendor.email}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Append the exhibitor HTML to the specified tag
                $('#fieldAp').append(exhibitorHTML);
            }

            function appendLotBooths(data) {
                // HTML template for lot/booths information
                const lotBoothsHTML = `
                    <div class="card mb-4 shadow-lg rounded">
                        <div class="card-body">
                            <h4 class="card-title">3. Lot / Booths</h4>
                            <hr class="my-10px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="booth-area boxed-check-group boxed-check-indigo mb-0">
                                        ${generateBoothsHTML(data.booth)}
                                        </div>
                                        <div id="invalid-booth-select" class="invalid-feedback text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 text-center">
                        <button class="btn btn-indigo btn-lg w-300px btn-confirm-bookings" type="submit">
                            Confirm and Bookings
                        </button>
                    </div>
                `;

                // Append the lot/booths HTML to the specified tag
                $('#fieldAp').append(lotBoothsHTML);
            }

            // Function to generate HTML for booth data
            function generateBoothsHTML(boothData) {
                let boothsHTML = '';

                // Loop through booth data and generate HTML for each booth
                boothData.forEach(booth => {
                    boothsHTML += `
                        <label class="booth-box boxed-check" for="btn_${booth.id}">
                            <input class="boxed-check-input" type="checkbox" name="booths[id][]" id="btn_${booth.id}" disabled>
                            <div class="boxed-check-label">${booth.booth_number}</div>
                        </label>
                    `;
                });

                return boothsHTML;
            }

            function handleFormSubmission(invoice) {
                $.ajax({
                    url: '{{ route("front.addonPost") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        invoice: invoice,
                    },
                    success: function (response) {
                        $('#fieldAp').empty();

                        if (response.status === true) {

                            appendAdditionalFurniture(response);
                            appendExhibitorParticulars(response);
                            appendLotBooths(response);

                            $('.btn-confirm-bookings').click(function (event) {
                                event.preventDefault();
                                handleConfirmBookings(response);
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            }

            // Main function to handle form submission and update HTML based on the response
            $('#search-inv').submit(function (event) {
                event.preventDefault();
                var invoice = $(this).find('input[name="invoice"]').val();
                handleFormSubmission(invoice);
            });

            function handleConfirmBookings(response) {
                // Extracting relevant data
                const furnitureData = JSON.parse(response.inv.inv_description);

                // Collecting data for submission
                const submissionData = {
                    _token: '{{ csrf_token() }}',
                    invoice: response.inv.inv_number,
                    items: [
                        {
                            name: 'Table',
                            price: parseFloat(furnitureData.add_on_table),
                            quantity: $('#add_table').val()
                        },
                        {
                            name: 'Chair',
                            price: parseFloat(furnitureData.add_on_chair),
                            quantity: $('#add_chair').val()
                        },
                        {
                            name: 'SSO (13 amp)',
                            price: parseFloat(furnitureData.add_on_sso),
                            quantity: $('#add_sso').val()
                        },
                        {
                            name: 'SSO (15 amp)',
                            price: parseFloat(furnitureData.add_on_sso_15amp),
                            quantity: $('#add_sso_15amp').val()
                        },
                        {
                            name: 'Steel Barricade',
                            price: parseFloat(furnitureData.add_on_steel_barricade),
                            quantity: $('#add_steel_barricade').val()
                        },
                        {
                            name: 'Shell Scheme Barricade',
                            price: parseFloat(furnitureData.add_on_shell_scheme_barricade),
                            quantity: $('#add_shell_scheme_barricade').val()
                        }
                    ]
                };

                $.ajax({
                    url: '{{ route("front.addonOrder") }}',
                    type: 'POST',
                    data: submissionData,
                    success: function (response) {
                        if (response.status === true) {
                            // console.log(response);
                            window.location.href = response.redirect;
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    </script>
@endpush
