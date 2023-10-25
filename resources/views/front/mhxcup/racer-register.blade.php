@extends('front.layout.mini4wp-master')

@section('title-mini4wd', 'Racer Details')

@section('page-minicup')
<div class="container p-sm-5 p-3">
    <div class="row">
        <div class="col-md-7 mx-auto">

            <div class="card">
                <div class="card-body">

                    <input type="hidden" name="category" value="{{ $category['category'] }}">

                    <div class="mb-3">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Identification Card Number</label>
                        <input type="text" class="form-control" id="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">T-Shirt</label>
                        <div class="tshirt-area boxed-check-group boxed-check-indigo mb-0">
                            <label class="tshirt-box boxed-check" for="">
                                <input class="boxed-check-input" type="checkbox" name="" id="">
                                <div class="boxed-check-label">XS</div>
                            </label>
                            <label class="tshirt-box boxed-check" for="">
                                <input class="boxed-check-input" type="checkbox" name="" id="">
                                <div class="boxed-check-label">S</div>
                            </label>
                            <label class="tshirt-box boxed-check" for="">
                                <input class="boxed-check-input" type="checkbox" name="" id="">
                                <div class="boxed-check-label">M</div>
                            </label>
                            <label class="tshirt-box boxed-check" for="">
                                <input class="boxed-check-input" type="checkbox" name="" id="">
                                <div class="boxed-check-label">L</div>
                            </label>
                            <label class="tshirt-box boxed-check" for="">
                                <input class="boxed-check-input" type="checkbox" name="" id="">
                                <div class="boxed-check-label">XL</div>
                            </label>
                            <label class="tshirt-box boxed-check" for="">
                                <input class="boxed-check-input" type="checkbox" name="" id="">
                                <div class="boxed-check-label">XXL</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-0 text-center">
                        <button type="submit" class="btn btn-red btn-lg w-300px text-white">
                            Proceed to Pay
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('onpagescript')
@endpush
