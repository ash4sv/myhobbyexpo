@extends('front.layout.mini4wp-master')

@section('title-mini4wd', 'Register Your Interest')

@section('page-minicup')
<div class="container p-sm-5 p-3">
    <div class="card-group">
        <div class="card">
            <div class="card-body p-5 text-center">
                <a href="" class="category-select">
                    <h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">SEMI-TECH</h3>
                </a>
                <input type="hidden" name="category" value="semi-tech">
            </div>
        </div>
        <div class="card">
            <div class="card-body p-5 text-center">
                <a href="" class="category-select">
                    <h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">B-MAX</h3>
                </a>
                <input type="hidden" name="category" value="b-max">
            </div>
        </div>
        <div class="card">
            <div class="card-body p-5 text-center">
                <a href="" class="category-select">
                    <h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">STOCK-CAR</h3>
                </a>
                <input type="hidden" name="category" value="stock-car">
            </div>
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

            // Make an AJAX POST request
            $.ajax({
                url: '{{ route("mhxcup.categoryPost") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    category: category
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
