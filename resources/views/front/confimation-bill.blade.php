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

    <div class="mx-auto form" style="max-width: 800px;">
        <div class="invoice">

            <div class="invoice-company">
                <span class="float-end hidden-print">
                <a id="create_pdf" href="javascript:;" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                {{--<a href="javascript:;" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print()" class="btn btn-sm btn-white mb-10px" data-cf-modified-f9fa0b3fe9a540ccd08b8edb-><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>--}}
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
                        <strong class="text-dark">{{ $vendor['company'] }}</strong><br/>
                        {{ $vendor['roc_rob'] }}<br/>
                        {{ $vendor['pic_name'] }}<br/>
                        {{ $vendor['phone_num'] }}<br/>
                        {{ $vendor['email'] }}
                    </address>
                </div>
                <div class="invoice-date">
                    <small>Prove of Payment</small>
                    <div class="date text-dark mt-5px">{{ date('d M Y', strtotime($invDate)) }}</div>
                    <div class="invoice-detail">
                        <h5 class="my-5px">{{ $ref }}</h5>
                        <h6>{{ $agent }}</h6>
                    </div>
                </div>
            </div>


            <div class="invoice-content">

                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th>ITEMS DESCRIPTION</th>
                            <th class="text-end" width="15%">RATE</th>
                            <th class="text-center" width="15%">QUANTITY</th>
                            <th class="text-end" width="15%">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($dataPull['booths'])
                            <tr>
                                <td>
                                    <span class="text-dark">Booths Booked:</span><br>
                                    @foreach($booths as $booth)
                                        <p class="small mb-0">{{ $booth->sections->name }} - {{ $booth->booth_number }}</p>
                                    @endforeach
                                </td>
                                <td class="text-end">RM {{ $dataPull['booth_price_unit'] }}</td>
                                <td class="text-center">{{ $dataPull['booth_qty'] }} x</td>
                                <td class="text-end">{{ $dataPull['booth_price'] }}</td>
                            </tr>
                        @endisset

                        @if($dataPull['add_table'] || $dataPull['add_chair'] || $dataPull['add_sso'] || $dataPull['add_sso_15amp'] || $dataPull['add_steel_barricade'] || $dataPull['add_shell_scheme_barricade'])
                            <tr>
                                <td colspan="4"><strong>Add On</strong></td>
                            </tr>
                        @endif
                        @if($dataPull['add_table'])
                            <tr>
                                <td>Table :</td>
                                <td class="text-end">RM {{ $dataPull['add_on_table'] }}</td>
                                <td class="text-center">{{ $dataPull['add_table'] }} x </td>
                                <td class="text-end">
                                    {{ $dataPull['table_TPrice'] }}
                                </td>
                            </tr>
                        @endif
                        @if($dataPull['add_chair'])
                            <tr>
                                <td>Chair : </td>
                                <td class="text-end">RM {{ $dataPull['add_on_chair'] }}</td>
                                <td class="text-center">{{ $dataPull['add_chair'] }} x</td>
                                <td class="text-end">
                                    {{ $dataPull['chair_TPrice'] }}
                                </td>
                            </tr>
                        @endif
                        @if($dataPull['add_sso'])
                            <tr>
                                <td>SSO (13 amp) : </td>
                                <td class="text-end">RM {{ $dataPull['add_on_sso'] }}</td>
                                <td class="text-center">{{ $dataPull['add_sso'] }} x</td>
                                <td class="text-end">
                                    {{ $dataPull['sso_TPrice'] }}
                                </td>
                            </tr>
                        @endif
                        @if($dataPull['add_sso_15amp'])
                            <tr>
                                <td>SSO (15 amp) : </td>
                                <td class="text-end">RM {{ $dataPull['add_on_sso_15amp'] }}</td>
                                <td class="text-center">{{ $dataPull['add_sso_15amp'] }} x</td>
                                <td class="text-end">
                                    {{ $dataPull['ssoamp15_TPrice'] }}
                                </td>
                            </tr>
                        @endif
                        @if($dataPull['add_steel_barricade'])
                            <tr>
                                <td>Steel Barricade : </td>
                                <td class="text-end">RM {{ $dataPull['add_on_steel_barricade'] }}</td>
                                <td class="text-center">{{ $dataPull['add_steel_barricade'] }} x</td>
                                <td class="text-end">
                                    {{ $dataPull['steel_barricade_TPrice'] }}
                                </td>
                            </tr>
                        @endif
                        @if($dataPull['add_shell_scheme_barricade'])
                            <tr>
                                <td>Shell Scheme Barricade : </td>
                                <td class="text-end">RM {{ $dataPull['add_on_shell_scheme_barricade'] }}</td>
                                <td class="text-center">{{ $dataPull['add_shell_scheme_barricade'] }} x</td>
                                <td class="text-end">
                                    {{ $dataPull['shell_scheme_barricade_TPrice'] }}
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>



                <div class="invoice-price">
                    <div class="invoice-price-left">
                        <div class="invoice-price-row">
                            {{--<div class="sub-price">
                                <small>SUBTOTAL</small>
                                <span class="text-dark">RM4,500.00</span>
                            </div>
                            <div class="sub-price">
                                <i class="fa fa-plus text-muted"></i>
                            </div>
                            <div class="sub-price">
                                <small>PAYPAL FEE</small>
                                <span class="text-dark">RM108.00</span>
                            </div>--}}
                        </div>
                    </div>
                    <div class="invoice-price-right" style="min-width: 280px !important;">
                        <small>TOTAL</small> <span class="fw-bold">{{ $dataPull['total'] }}</span>
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

@push('reg-script')
    <script>

        $(document).ready(function () {
            var form = $('.form'),
                cache_width = form.width(),
                a4 = [595.28, 841.89]; // for a4 size paper width and height

            $('#create_pdf').on('click', function () {
                $('body').scrollTop(0);
                createPDF();
            });

            function createPDF() {
                getCanvas().then(function (canvas) {
                    var
                        img = canvas.toDataURL("image/png"),
                        doc = new jsPDF({
                            unit: 'px',
                            format: 'a4'
                        });
                    doc.addImage(img, 'JPEG', 20, 20);
                    doc.save('techsolutionstuff.pdf');
                    form.width(cache_width);
                });
            }

            function getCanvas() {
                form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }
        });

    </script>
@endpush
