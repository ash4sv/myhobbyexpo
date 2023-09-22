@extends('front.layout.master')

@section('reg-form')

    <div class="nav-wizards-container">
        <nav class="nav nav-wizards-2 mb-3">
            <!-- completed -->
            <div class="nav-item col">
                <a class="nav-link active" href="javascript:;">
                    <div class="nav-text">1. YOUR INTEREST</div>
                </a>
            </div>

            <!-- active -->
            <div class="nav-item col">
                <a class="nav-link disabled" href="javascript:;">
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

    <div class="card" id="your_interest">
        <div class="card-body">
            <h4 class="card-title">1. YOUR INTEREST</h4>
            <div class="row gx-5">
                @foreach($exhibits as $exhibit)
                    <div class="col-md-4">
                        <a href="{{ route('front.typeofinterest', 'key='.$exhibit->slug) }}" id="{{ $exhibit->slug }}">
                            <img src="https://dummyimage.com/600x900/d9d9d9/fff.png" alt="" class="img-fluid">
                        </a>
                        <h4 class="text-center">{{ $exhibit->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('reg-script')

@endpush
