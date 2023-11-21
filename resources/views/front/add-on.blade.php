@extends('front.layout.master')

@section('page-title', 'VENDOR REGISTRATION')

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

            <div class="card mb-4 shadow-lg rounded">
                <div class="card-body">

                    <h4 class="card-title">2. Additional Furniture, Fixtures and Equipment</h4>
                    <hr class="my-10px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Table (RM 45.00 / Unit)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="RM 45.00" id="table_TPrice" name="table_TPrice" readonly>
                                    <input type="hidden" name="add_on_table" id="add_on_table" value="45.00">
                                    <select name="add_table" id="add_table" class="form-control">
                                        <option value="0">0</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Chair (RM RM 9.00 / Unit)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="RM 9.00" id="chair_TPrice" name="chair_TPrice" readonly>
                                    <input type="hidden" name="add_on_chair" id="add_on_chair" value="9.00">
                                    <select name="add_chair" id="add_chair" class="form-control">
                                        <option value="0">0</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">SSO (13 amp) (RM 70.00 / Point)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="RM 70.00" id="sso_TPrice" name="sso_TPrice" readonly>
                                    <input type="hidden" name="add_on_sso" id="add_on_sso" value="70.00">
                                    <select name="add_sso" id="add_sso" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">SSO (15 amp) (RM 150.00 / Point)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="RM 150.00" id="ssoamp15_TPrice" name="ssoamp15_TPrice" readonly>
                                    <input type="hidden" name="add_on_sso_15amp" id="add_on_sso_15amp" value="150.00">
                                    <select name="add_sso_15amp" id="add_sso_15amp" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Steel Barricade (RM 55.00 / Unit)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="RM 55.00" id="steel_barricade_TPrice" name="steel_barricade_TPrice" readonly>
                                    <input type="hidden" name="add_on_steel_barricade" id="add_on_steel_barricade" value="55.00">
                                    <select name="add_steel_barricade" id="add_steel_barricade" class="form-control">
                                        <option value="0">0</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Shell Scheme Barricade (RM 35.00 / meter)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="RM 35.00" id="shell_scheme_barricade_TPrice" name="shell_scheme_barricade_TPrice" readonly>
                                    <input type="hidden" name="add_on_shell_scheme_barricade" id="add_on_shell_scheme_barricade" value="35.00">
                                    <select name="add_shell_scheme_barricade" id="add_shell_scheme_barricade" class="form-control">
                                        <option value="0">0</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mb-4 shadow-lg rounded">
                <div class="card-body">

                    <h4 class="card-title">3. Exhibitor Particulars</h4>
                    <hr class="my-10px">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staticEmail" class="form-label">Registed Company</label>
                                <input type="text" class="form-control" id="" value="response.vendor.company" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staticEmail" class="form-label">Registed ROC / ROB</label>
                                <input type="text" class="form-control" id="" value="response.vendor.roc_rob" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staticEmail" class="form-label">Registed Person In-charge</label>
                                <input type="text" class="form-control" id="" value="response.vendor.pic_name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staticEmail" class="form-label">Registed Phone Number</label>
                                <input type="text" class="form-control" id="" value="response.vendor.phone_num" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="staticEmail" class="form-label">Registed Email</label>
                                <input type="text" class="form-control" id="" value="response.vendor.email" readonly>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="fieldAp" class="col-md-8">
            </div>
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        $(document).ready(function () {
            $('#search-inv').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                var invoice = $(this).find('input[name="invoice"]').val();

                $.ajax({
                    url: '{{ route("front.addonPost") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        invoice: invoice, // Assuming you want to send "invoice" as a parameter
                    },
                    success: function (response) {
                        $('#fieldAp').empty();

                        if(response.status == 1) {

                            $('#fieldAp').append(
                                '<div class="card mb-4 shadow-lg rounded">' +
                                '<div class="card-body">' +
                                '<div id="merchandise_" class="text-center">' +

                                '</div>' +
                                '</div>' +
                                '</div>'
                            )

                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
