@extends('layouts.master')

@section('page-title', 'Booth Booked - ' . $booths->vendor->company )
@section('page-header', 'Booth Booked - ' . $booths->vendor->company )
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">@yield('page-title')</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="30%">Invoice Number :</td>
                        <td>
                            {{ $booths->inv_number }}
                        </td>
                    </tr>
                    <tr>
                        <td>Date :</td>
                        <td>
                            {{ $booths->inv_date }}
                        </td>
                    </tr>
                    @isset($booths->vendor)
                    <tr>
                        <td>Company : </td>
                        <td>
                            {{ $booths->vendor->company }}
                        </td>
                    </tr>
                    @endisset
                    @isset($booths->vendor)
                    <tr>
                        <td>Name :</td>
                        <td>
                            {{ $booths->vendor->pic_name }}
                        </td>
                    </tr>
                    @endisset
                    @isset($booths->vendor)
                    <tr>
                        <td>Phone :</td>
                        <td>
                            {{ $booths->vendor->phone_num }}
                        </td>
                    </tr>
                    @endisset
                    @isset($booths->vendor->registerBooth)
                    <tr>
                        <td> Hall | Zone | Booth : </td>
                        <td>
                            @foreach($booths->vendor->registerBooth as $booth)
                                <p class="my-0">
                                    @isset($booth->sections->hall)
                                    {{ $booth->sections->hall->name }} | {{ $booth->sections->name }} |
                                    @endisset
                                    {{ $booth->booth_number }}
                                </p>
                            @endforeach
                        </td>
                    </tr>
                    @endisset
                    {{--<tr>
                        <td colspan="2">{{ $booths }}</td>
                    </tr>--}}
                    {{--@foreach ($boothData as $key => $value)
                        @if ($key === 'booths' && is_array($value))
                            <tr>
                                <td>{{ ucwords(str_replace('_', ' ', $key)) }}:</td>
                                <td>
                                    {{ implode(', ', array_filter(array_keys($value['id']), function ($id) use ($value) {
                                        return $value['id'][$id] > 0;
                                    })) }}
                                </td>
                            </tr>
                        @elseif ($value > 0)
                            <tr>
                                <td>{{ ucwords(str_replace('_', ' ', $key)) }}:</td>
                                <td>{{ is_array($value) ? json_encode($value) : htmlspecialchars($value) }}</td>
                            </tr>
                        @endif
                    @endforeach--}}
                    @foreach($itemsToDisplay as $item)
                        @if(isset($jsonData[$item]) && $jsonData[$item] > 0)
                            <tr>
                                <td>{{ ucwords(str_replace('_', ' ', $item)) }}</td>
                                <td>{{ $jsonData[$item] }}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td>Agent :</td>
                        <td>
                            {{ $booths->agent->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Paid :</td>
                        <td>
                            {{ $booths->total }}
                        </td>
                    </tr>
                    @isset($booths->inv_number)
                    <tr>
                        <td>Invoice :</td>
                        <td>
                            <a data-fancybox href="{{ asset('assets/upload/'.$booths->inv_number.'.pdf') }}" class="btn btn-xs btn-yellow btn-sm my-n1 ms-2">View Invoice</a>
                        </td>
                    </tr>
                    @endisset
                </tbody>
            </table>

            <a href="{{ url('booth-booked') }}" class="btn btn-indigo btn-lg w-150px">Back</a>

        </div>
    </div>

@endsection

@push('script')

@endpush
