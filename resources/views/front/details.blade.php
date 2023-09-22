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
                <a class="nav-link completed" href="javascript:;">
                    <div class="nav-text">2. BOOTHS</div>
                </a>
            </div>

            <!-- disabled -->
            <div class="nav-item col">
                <a class="nav-link active" href="javascript:;">
                    <div class="nav-text">3. COMPANY / GROUP DETAILS</div>
                </a>
            </div>
        </nav>
    </div>

    <div class="card" id="company_register">
        <div class="card-body">
            <h4 class="card-title">3. COMPANY / GROUP DETAILS</h4>
            <form action="" method="POST">
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
            </form>
        </div>
    </div>

@endsection
