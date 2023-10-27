@extends('front.layout.mini4wp-master')

@section('title-mini4wd', 'Register Your Interest')

@section('page-minicup')
<div class="container p-sm-5 p-3">
    <h2 class="text-center mt-sm-0 mb-sm-5 mt-4 mb-5 font-weight-700 text-uppercase">Please select your race category</h2>

    <div class="card-group">
        <div class="card border-0">
            <div class="card-body p-0 text-center">
                <a href="" class="category-select">
                    <img src="{{ asset('assets/upload/mhxc_001.png') }}" alt="" class="img-fluid">
                    {{--<h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">SEMI-TECH</h3>--}}
                </a>
                <input type="hidden" name="category" value="semi-tech class a">
                <input type="hidden" name="price_category" value="200">
            </div>
            {{--<div class="card-footer">
                Card footer
            </div>--}}
        </div>
        <div class="card border-0">
            <div class="card-body p-0 text-center">
                <a href="" class="category-select">
                    <img src="{{ asset('assets/upload/mhxc_002.png') }}" alt="" class="img-fluid">
                    {{--<h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">B-MAX</h3>--}}
                </a>
                <input type="hidden" name="category" value="b-max class b">
                <input type="hidden" name="price_category" value="120">
            </div>
            {{--<div class="card-footer">
                Card footer
            </div>--}}
        </div>
        <div class="card border-0">
            <div class="card-body p-0 text-center">
                <a href="" class="category-select">
                    <img src="{{ asset('assets/upload/mhxc_003.png') }}" alt="" class="img-fluid">
                    {{--<h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">STOCK-CAR</h3>--}}
                </a>
                <input type="hidden" name="category" value="stock-car class c">
                <input type="hidden" name="price_category" value="35">
            </div>
            {{--<div class="card-footer">
                Card footer
            </div>--}}
        </div>
    </div>
</div>
@endsection

@push('onpagescript')
<script>
    $(document).ready(function() {
        $('.category-select').on('click', function() {
            event.preventDefault(); // Prevent the default behavior of the anchor tag
            var category = $(this).siblings('input[name="category"]').val(); // Get the category value
            var price_category = $(this).siblings('input[name="price_category"]').val(); // Get the category value

            // Make an AJAX POST request
            $.ajax({
                url: '{{ route("mhxcup.categoryPost") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    category: category,
                    price_category: price_category
                },
                success: function(response) {
                    console.log(response.message);
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endpush
