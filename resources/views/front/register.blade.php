@extends('front.layout.master')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto mb-5">
            <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-30px img-fluid">
        </div>
    </div>

    <div id="interest_in">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-3 col-6">
                <a href="" id="flea_market_btn">
                    <img src="{{ asset('assets/images/flea-market.png') }}" alt="" class="img-fluid">
                    <input type="hidden" name="" class="form-control">
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="" id="hobby_group_zone_btn">
                    <img src="{{ asset('assets/images/hobby-group-zone.png') }}" alt="" class="img-fluid">
                    <input type="hidden" name="" class="form-control">
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="" id="activity_zone_zone_btn">
                    <img src="{{ asset('assets/images/activity-zone.png') }}" alt="" class="img-fluid">
                    <input type="hidden" name="" class="form-control">
                </a>
            </div>
        </div>
    </div>

    <div id="flea_market">
        <div id="booth_type">
            <div class="row justify-content-center g-4 pb-5">
                @foreach($categories as $category)
                <div class="col-md-3 col-6">
                    <a href="" id="flea_market_{{ $category->slug }}_btn">
                        <img src="{{ asset($category->image) }}" alt="" class="img-fluid">
                        <input type="hidden" name="" class="form-control">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        @foreach($categories as $category)
        <div id="{{ $category->slug }}_lot">
            <div class="row justify-content-center g-4 pb-5">
                <div class="col-md-9">
                    <div class="card mb-4 shadow-lg rounded">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/layout-1@4x-50.jpg') }}" class="img-fluid" alt="...">
                        </div>
                    </div>

                    <div class="card shadow-lg rounded">
                        <div class="card-body">

                            <form action="" method="post">
                                @csrf
                                <h4 class="card-title">1. Additional Furniture, Fixtures and Equipment</h4>
                                <hr class="my-10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Quantity Booths</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control default-select2">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <input type="text" aria-label="" class="form-control" name="" id="" readonly value="RM {{ $category->price }}">
                                            </div>
                                            <div id="" class="form-text">Came with {{ $category->table }} Unit Table,
                                                {{ $category->chair }} Unit Chair, {{ $category->sso }} Unit SSO 13Amp for 1 booths</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">

                                            <div class="booth-area">
                                                @foreach($category->numbers as $number)
                                                <div class="booth-box {{ $number->status == 1? 'selected':'' }}">
                                                    <input type="checkbox" name="booth[][{{$number->id}}]" id="btn_{{ $number->id }}_{{ $number->slug }}" {{ $number->status == 1? 'disable':'' }}>
                                                    <label for="btn_{{ $number->id }}_{{ $number->slug }}" class="booth-label">{{ $number->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">2. Additional Furniture, Fixtures and Equipment</h4>
                                <hr class="my-10px">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Table</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="">RM 1.00</span>
                                                <select name="" id="" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Chair</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">RM 1.00</span>
                                                <select name="" id="" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Switch Socket Outlet (13 amp)</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">RM 1.00</span>
                                                <select name="" id="" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0 text-center">
                                    <button type="submit" class="btn btn-indigo btn-lg w-300px">
                                        Submit
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{--<div id="normal_lot">
            <div class="row justify-content-center g-4 pb-5">
                <div class="col-md-9">
                    <div class="card shadow-lg rounded">
                        <div class="card-body">

                            <img src="{{ asset('assets/images/layout-1@4x-50.jpg') }}" class="card-img-top" alt="...">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="bazaar_lot">
            <div class="row justify-content-center g-4 pb-5">
                <div class="col-md-9">
                    <div class="card shadow-lg rounded">
                        <div class="card-body">

                            <img src="{{ asset('assets/images/layout-1@4x-50.jpg') }}" class="card-img-top" alt="...">

                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>

    <div id="hobby_group_zone">
        <h1 class="text-white">hobby_group_zone</h1>
    </div>

    <div id="activity_zone">
        <h1 class="text-white">activity_zone</h1>
    </div>

    <div id="details">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">1. Exhibitor Particulars</h4>
                        <hr class="my-10px">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Name of Company / Shop / Group / Club / Associate: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_name" id="company_name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="person_in_charge" class="form-label">ROC / ROB / ROC: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="person_in_charge" id="person_in_charge" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="person_in_charge" class="form-label">Name of Person in Charge: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="person_in_charge" id="person_in_charge" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">Contact No.: <span class="text-danger">*</span></label>
                                    <input class="form-control masked-input-phone" type="text" name="contact_no" id="contact_no" placeholder="+6019 999 9999" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" required />
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

                        <div class="mb-0">
                            <button type="button" class="btn btn-primary px-5">
                                Submit
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        $('#flea_market, #hobby_group_zone, #activity_zone, #details, #premium_lot, #normal_lot, #bazaar_lot').hide();

        $('#flea_market_btn').click(function () {
            event.preventDefault();
            $('#flea_market').show();
            $('#interest_in').hide();

            $('#premium_lot, #normal_lot, #bazaar_lot').hide()

            $('#flea_market_premium_btn').click(function () {
                event.preventDefault();
                $('#premium_lot').show();
                $('#booth_type').hide();
            });
            $('#flea_market_normal_btn').click(function () {
                event.preventDefault();
                $('#normal_lot').show();
                $('#booth_type').hide();
            });
            $('#flea_market_bazaar_btn').click(function () {
                event.preventDefault();
                $('#bazaar_lot').show();
                $('#booth_type').hide();
            });
        })

        $('#hobby_group_zone_btn').click(function () {
            event.preventDefault();
            $('#hobby_group_zone').show();
            $('#interest_in').hide();
        })

        $('#activity_zone_zone_btn').click(function () {
            event.preventDefault();
            $('#activity_zone').show();
            $('#interest_in').hide();
        })
    </script>
@endpush
