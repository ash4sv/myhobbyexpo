@extends('front.layout.master')

@section('reg-form')

    <div class="nav-wizards-container">
        <nav class="nav nav-wizards-2 mb-3">
            <!-- completed -->
            <div class="nav-item col">
                <a class="nav-link completed" href="javascript:;">
                    <div class="nav-text">1. YOUR INTEREST</div>
                </a>
            </div>

            <!-- active -->
            <div class="nav-item col">
                <a class="nav-link active" href="javascript:;">
                    <div class="nav-text">2. BOOTHS</div>
                </a>
            </div>

            <!-- disabled -->
            <div class="nav-item col">
                <a class="nav-link disabled" href="javascript:;">
                    <div class="nav-text">3. COMPANY / GROUP DETAILS</div>
                </a>
            </div>
        </nav>
    </div>

    {{-- Form 1: Booth Design --}}
    <div class="card" id="booth_design">
        <div class="card-body">
            <h4 class="card-title">2. BOOTHS</h4>

            {{--FLEA MARKET--}}
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="premium" name="boots_type" checked />
                            <label class="form-check-label" for="premium">Premium</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="normal" name="boots_type" />
                            <label class="form-check-label" for="normal">Normal</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="bazaar" name="boots_type" />
                            <label class="form-check-label" for="bazaar">Bazaar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form 2: Hobby Group Zone --}}
    <div class="card" id="hobby_group_form">
        <div class="card-body">
            <h4 class="card-title">2. BOOTHS</h4>

            {{--HOBBY GROUP ZONE--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">QUANTITY OF LOT?</label>
                        <select class="form-control default-select2" name="premium_lot_quantity">
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
                    <div class="mb-3">
                        <label class="form-label">Table</label>
                        <select name="" id="" class="form-control default-select2">
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
                    <div class="mb-3">
                        <label class="form-label">Chair</label>
                        <select name="" id="" class="form-control default-select2">
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
                    <div class="mb-3">
                        <label class="form-label">Switch Socket Outlet (13 amp)</label>
                        <select name="" id="" class="form-control default-select2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form 3: Activity Zone --}}
    <div class="card" id="activity_zone_form">
        <div class="card-body">
            <h4 class="card-title">2. BOOTHS</h4>

            {{--ACTIVITY ZONE--}}
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="mb-3">
                        <label class="form-label">Location barred size (Meter)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="Length" placeholder="Length">
                            <span class="input-group-text input-group-addon">to</span>
                            <input type="text" class="form-control" name="Width" placeholder="Width">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Table</label>
                        <select name="" id="" class="form-control default-select2">
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
                    <div class="mb-3">
                        <label class="form-label">Chair</label>
                        <select name="" id="" class="form-control default-select2">
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
                    <div class="mb-3">
                        <label class="form-label">Switch Socket Outlet (13 amp)</label>
                        <select name="" id="" class="form-control default-select2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('reg-script')
@endpush
