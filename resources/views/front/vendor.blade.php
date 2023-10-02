@extends('front.layout.master')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto mb-5">
            <a href="{{ route('front.register') }}">
                <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-30px img-fluid">
            </a>
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
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td width="33%">Sub Total :</td>
                                        <td width="33%"></td>
                                        <td class="text-end">
                                            {{ $subTotal }}
                                            <input type="hidden" name="subtotal_val" value="{{ $subTotal }}">
                                        </td>
                                    </tr>
                                    @if($data['add_table'] > 0 || $data['add_chair'] > 0 || $data['add_sso'] > 0)
                                        <tr>
                                            <td colspan="3">
                                                <span class="fw-bold">Add On :</span>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_table'] > 0)
                                        <tr>
                                            <td>Table :</td>
                                            <td class="text-center">{{ $data['add_table'] }} x </td>
                                            <td class="text-end">
                                                {{ $data['table_TPrice'] }}
                                                <input type="hidden" name="add_on_table" value="{{ $data['table_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_chair'] > 0)
                                        <tr>
                                            <td>Chair : </td>
                                            <td class="text-center">{{ $data['add_chair'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['chair_TPrice'] }}
                                                <input type="hidden" name="add_on_chair" value="{{ $data['chair_TPrice'] }}">
                                            </td>
                                        </tr>
                                    @endif
                                    @if($data['add_sso'] > 0)
                                        <tr>
                                            <td>SSO : </td>
                                            <td class="text-center">{{ $data['add_sso'] }} x</td>
                                            <td class="text-end">
                                                {{ $data['sso_TPrice'] }}
                                                <input type="hidden" name="add_on_sso" value="{{ $data['sso_TPrice'] }}">
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="roc_rob" class="form-label">ROC / ROB / ROC: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="roc_rob" id="roc_rob" />
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
