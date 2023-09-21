<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MHX2023 EXHIBITOR | REGISTRATION</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

</head>
<body class="pace-top">

@include('layouts.loader')

<div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-height">
    <div class="container py-5">
        <div class="col-md-12 mx-auto">

            <div class="nav-wizards-container">
                <nav class="nav nav-wizards-2 mb-3">
                    <!-- completed -->
                    <div class="nav-item col">
                        <a class="nav-link active" href="#">
                            <div class="nav-text">1. YOUR INTEREST</div>
                        </a>
                    </div>

                    <!-- active -->
                    <div class="nav-item col">
                        <a class="nav-link disabled" href="#">
                            <div class="nav-text">2. BOOTHS</div>
                        </a>
                    </div>

                    <!-- disabled -->
                    <div class="nav-item col">
                        <a class="nav-link disabled" href="#">
                            <div class="nav-text">3. COMPANY / GROUP DETAILS</div>
                        </a>
                    </div>
                </nav>
            </div>

            <div class="card" id="your_interest">
                <div class="card-body">
                    <h4 class="card-title">1. YOUR INTEREST</h4>
                    <div class="row gx-5">
                        <div class="col-md-4">
                            <a href="" id="market">
                                <img src="https://dummyimage.com/600x900/d9d9d9/fff.png" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="" id="hobby">
                                <img src="https://dummyimage.com/600x900/d9d9d9/fff.png" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="" id="activity">
                                <img src="https://dummyimage.com/600x900/d9d9d9/fff.png" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

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

                    <hr>

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

                    <hr>

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

            <div class="card" id="company_register">
                <div class="card-body">
                    <h4 class="card-title">3. COMPANY / GROUP DETAILS</h4>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Name of Company / Shop / Group: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_name" id="company_name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="person_in_charge" class="form-label">ROC / ROB: <span class="text-danger">*</span></label>
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
                                    <label for="website" class="form-label">Hobby Group Image Gathering</label>
                                    <input class="form-control" type="file" name="website" id="website" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <button type="button" class="btn btn-primary px-5">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>

<script src="{{ asset('assets/js/vendor.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/js/demo/login-v2.demo.js') }}" type="text/javascript"></script>

<script>
    $(".default-select2").select2();
    $(".masked-input-phone").mask("+6099 999 9999");
</script>

</body>
</html>
