<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MHX2023</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <style>
        :root {
            font-size: 9.5pt;
            font-weight: 400;
            line-height: 14pt;
        }
        @page {
            margin: 0rem 0rem;
            size: A4;
        }
        body {
            font-family: "Open Sans", Arial ,sans-serif;
            color: #2d353c;
            -webkit-text-size-adjust: 100%;
            /*background-color: red;*/
            letter-spacing: normal;
        }
        body, html, div, h1, h2, h3, h4, h5, h6, p {
            margin: 0;
            padding: 0;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: 400;
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-bottom-width: 0;
        }
        th, td {
            vertical-align: top;
            /*padding: 10px;*/
            /*border: 1px;*/
        }
        address {
            font-style: normal;
        }
        table.table tbody tr td {
            width: calc(100% / 6);
        }
        table.table thead tr th:first-child,
        table.table tbody tr td:first-child {
            text-align: left;
        }
        .font-weight-600 {
            font-weight: 600;
        }
        .form {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
        }
        .mb-10px {
            margin-bottom: 10px;
        }

        table.table-details th, td {
            vertical-align: top;
            /*padding: 10px;*/
            /*border: 1px;*/
        }
        table.table-details thead tr th:nth-child(2),
        table.table-details thead tr th:nth-child(4),
        table.table-details tbody tr td:nth-child(2),
        table.table-details tbody tr td:nth-child(4) {
            text-align: right;
        }
        table.table-details thead tr th:nth-child(3),
        table.table-details tbody tr td:nth-child(3) {
            text-align: center;
        }
        table.table-details thead tr th:nth-child(4) {

        }
        table.table-details thead tr th,
        table.table-details tbody tr td {
            padding: 5px 10px;
        }
        table.table-details > :not(caption) > * > * {
            padding: .5rem .5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
        }
    </style>

</head>
<body>

<div class="form">
    <table class="table">
        <tbody>
        <tr>
            <td width="16.66666667%"></td>
            <td width="16.66666667%"></td>
            <td width="16.66666667%"></td>
            <td width="16.66666667%"></td>
            <td width="16.66666667%"></td>
            <td width="16.66666667%"></td>
        </tr>
        <tr>
            <td colspan="6" style="padding: 15px;">
                <h2 class="font-weight-600">SPECTA Group Ventures</h2>
            </td>
        <tr style="background-color:#f2f3f4;">
            <td colspan="2" style="padding: 15px;">
                <small class="mb-10px">From</small>
                <h2 style="font-size:14px;" class="font-weight-600">SPECTA Group Ventures</h2>
                <address class="mt-5px mb-5px">
                    S-03-27 EMPORIS KOTA DAMANSARA, <br/>
                    JALAN PERSIARAN SURIAN, <br/>
                    47810, PETALING JAYA SELANGOR <br>
                    SELANGOR <br/>
                    {{--Phone: (123) 456-7890 <br/>--}}
                    {{--Fax: (123) 456-7890--}}
                </address>
            </td>
            <td colspan="2" style="padding: 15px;">
                <small class="mb-10px">To</small>
                <h2 style="font-size:14px;" class="font-weight-600">@isset($vendor) {{ $vendor['company'] }} @endisset</h2>
                <address class="mt-5px mb-5px">
                    @isset($vendor) {{ $vendor['roc_rob'] }} @endisset<br/>
                    @isset($vendor) {{ $vendor['pic_name'] }} @endisset<br/>
                    @isset($vendor) {{ $vendor['phone_num'] }} @endisset<br/>
                    @isset($vendor) {{ $vendor['email'] }} @endisset
                </address>
            </td>
            <td colspan="2" style="padding: 15px; text-align: right;">
                <small class="mb-10px">Prove of Payment</small>
                <h2 style="font-size:14px;" class="font-weight-600">@isset($invDate) {{ date('d M Y', strtotime($invDate)) }}@endisset</h2>
                <div class="invoice-detail">
                    @isset($ref) {{ $ref }}@endisset<br>
                    @isset($agent) {{ $agent }}@endisset
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="padding:15px;">

                <table class="table-details">
                    <thead>
                    <tr>
                        <th width="50%">ITEMS DESCRIPTION</th>
                        <th>RATE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
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
                    @isset($dataPull)
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
                    @endisset
                    </tbody>
                </table>

            </td>
        </tr>
        <tr>
            <td style="background-color: #f2f3f4; padding:15px; " colspan="3"></td>
            <td style="background-color:#2d353c; padding:15px; text-align: left;">
                <span style="color:#ffffff;">TOTAL</span>
            </td>
            <td style="background-color:#2d353c; padding:15px;" colspan="2">
                <h1 class="font-weight-600" style="font-size:35px; text-align: right; color: #ffffff;">@isset($dataPull['total']){{ $dataPull['total'] }}@endisset</h1>
            </td>
        </tr>
        <tr>
            <td style="height:20px;" colspan="6"></td>
        </tr>
        <tr>
            <td colspan="6">
                <ol>
                    <li>Make all cheques payable to [Your Company Name]</li>
                    <li>Payment is due within 30 days</li>
                    <li>If you have any questions concerning this invoice, contact [Name, Phone Number, Email]</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="height:20px;" colspan="6"></td>
        </tr>
        <tr style="">
            <td colspan="6" style="text-align: center; padding: 25px 0; border-top: 0.5px solid #000000;">
                <p class="font-weight-600">THANK YOU FOR YOUR BUSINESS</p>
                <p>www.myhobbyexpo.com | 016 6443 005</p>
            </td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>
