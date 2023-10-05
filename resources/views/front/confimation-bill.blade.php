@extends('front.layout.master')

@section('reg-form')

    {{--<table class="table table-dark">
        @php
            $count = 1;
        @endphp
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Bill ID</th>
            <th scope="col">Collection ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $count++ }}</th>
            <td>{{ $bill['id'] }}</td>
            <td>{{ $bill['data']['collection_id'] }}</td>
            <td>{{ $bill['data']['name'] }}</td>
            <td>{{ $bill['paid'] }}</td>
        </tr>
        </tbody>
    </table>--}}

    <div class="mx-auto" style="max-width: 800px;">
        <div class="invoice">

            <div class="invoice-company">
                <span class="float-end hidden-print">
                <a href="javascript:;" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                <a href="javascript:;" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print()" class="btn btn-sm btn-white mb-10px" data-cf-modified-f9fa0b3fe9a540ccd08b8edb-><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                </span>
                <a href="{{ route('front.register') }}">SPECTA Group Ventures</a>
            </div>


            <div class="invoice-header">
                <div class="invoice-from">
                    <small>from</small>
                    <address class="mt-5px mb-5px">
                        <strong class="text-dark">SPECTA Group Ventures</strong><br/>
                        S-03-27 EMPORIS KOTA DAMANSARA,<br/>
                        JALAN PERSIARAN SURIAN,<br/>
                        47810, PETALING JAYA SELANGOR <br>
                        SELANGOR
                        {{--Phone: (123) 456-7890<br/>
                        Fax: (123) 456-7890--}}
                    </address>
                </div>
                <div class="invoice-to">
                    <small>to</small>
                    <address class="mt-5px mb-5px">
                        <strong class="text-dark">{{ $vendor->company }}</strong><br/>
                        {{ $vendor->roc_rob }}<br/>
                        {{ $vendor->pic_name }}<br/>
                        {{ $vendor->phone_num }}<br/>
                        {{ $vendor->email }}
                    </address>
                </div>
                <div class="invoice-date">
                    <small>Prove of Payment</small>
                    <div class="date text-dark mt-5px">{{ date('d M Y', strtotime($bookedPull['inv_date'])) }}</div>
                    <div class="invoice-detail">
                        <h5 class="my-0">{{ $bookedPull['inv_number'] }}</h5>
                    </div>
                </div>
            </div>


            <div class="invoice-content">

                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th>ITEMS DESCRIPTION</th>
                            <th class="text-center" width="15%">RATE</th>
                            <th class="text-center" width="15%">QUANTITY</th>
                            <th class="text-end" width="15%">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($booths)
                            <tr>
                                <td>
                                    <span class="text-dark">Booths Booked:</span><br>
                                    @foreach($booths as $booth)
                                        <small>{{ $booth->sections->name }} - {{ $booth->booth_number }}</small> <br>
                                    @endforeach
                                </td>
                                <td class="text-center">RM{{ number_format($booth_price_unit) }}</td>
                                <td class="text-center">{{ $booth_qty }}</td>
                                <td class="text-end">{{ $booth_price }}</td>
                            </tr>
                        @endisset

                        @php
                            $hasAddOnWithQuantity = false;
                        @endphp

                        @if ($hasAddOnWithQuantity)
                            <tr>
                                <td colspan="4"><strong>Add On</strong></td>
                            </tr>
                        @endif

                        @foreach (json_decode($bookedPull['add_on']) as $addOn)
                            @if ($addOn->qty > 0)
                                @php
                                    $hasAddOnWithQuantity = true;
                                @endphp
                                <tr>
                                    <td><span class="text-dark">{{ $addOn->item }}</span></td>
                                    <td class="text-center">RM{{ number_format(str_replace("RM ", "", $addOn->unit) / $addOn->qty, 2, '.', '') }}</td>
                                    <td class="text-center">{{ $addOn->qty }}</td>
                                    <td class="text-end">{{ $addOn->unit }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>



                <div class="invoice-price">
                    <div class="invoice-price-left">
                        {{--<div class="invoice-price-row">
                            <div class="sub-price">
                                <small>SUBTOTAL</small>
                                <span class="text-dark">RM4,500.00</span>
                            </div>
                            <div class="sub-price">
                                <i class="fa fa-plus text-muted"></i>
                            </div>
                            <div class="sub-price">
                                <small>PAYPAL FEE</small>
                                <span class="text-dark">RM108.00</span>
                            </div>
                        </div>--}}
                    </div>
                    <div class="invoice-price-right" style="min-width: 280px !important;">
                        <small>TOTAL</small> <span class="fw-bold">RM {{ $bookedPull['total'] }}</span>
                    </div>
                </div>

            </div>


            <div class="invoice-note">
                * Make all cheques payable to [Your Company Name]<br/>
                * Payment is due within 30 days<br/>
                * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
            </div>


            <div class="invoice-footer">
                <p class="text-center mb-5px fw-bold">
                    THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center">
                    <span class="me-10px"><i class="fa fa-fw fa-lg fa-globe"></i> www.myhobbyexpo.com</span>
                    <span class="me-10px"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T: 016 6443 005</span>
                    {{--<span class="me-10px"><i class="fa fa-fw fa-lg fa-envelope"></i> <a href="../../../cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="2e5c5a474b435e5d6e49434f4742004d4143">[email&#160;protected]</a></span>--}}
                </p>
            </div>

        </div>
    </div>

@endsection
