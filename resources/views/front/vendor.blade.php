@extends('front.layout.master')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto mb-5">
            <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-30px img-fluid">
        </div>
    </div>

    <div id="details">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-9">

                <form action="{{ route('front.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow-lg rounded mb-4">
                        <div class="card-header bg-transparent border-bottom py-3 px-4">
                            <h5 class="font-size-16 mb-0">Order Summary {{--<span class="float-end">#MN0124</span>--}}</h5>
                        </div>
                        <div class="card-body p-4 pt-2">

                            <div class="table-responsive">
                                <table class="table mb-0 h3">
                                    <tbody>
                                    <tr>
                                        <td>Sub Total :</td>
                                        <td class="text-end">RM 780</td>
                                    </tr>
                                    {{--<tr>
                                        <td>Discount : </td>
                                        <td class="text-end">- $ 78</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge :</td>
                                        <td class="text-end">$ 25</td>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax : </td>
                                        <td class="text-end">$ 18.20</td>
                                    </tr>--}}
                                    <tr class="bg-light">
                                        <th>Total :</th>
                                        <td class="text-end">
                                            <span class="fw-bold">
                                                RM 745
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="person_in_charge" class="form-label">ROC / ROB / ROC: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="person_in_charge" id="person_in_charge" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="person_in_charge" class="form-label">Name of Person in Charge: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="person_in_charge" id="person_in_charge" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contact_no" class="form-label">Contact No.: <span class="text-danger">*</span></label>
                                        <input class="form-control masked-input-phone" type="text" name="contact_no" id="contact_no" placeholder="+6019 999 9999" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" />
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
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label">Image Gathering</label>
                                        <input class="form-control" type="file" name="website" id="website" />
                                    </div>
                                </div>
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





@endsection
