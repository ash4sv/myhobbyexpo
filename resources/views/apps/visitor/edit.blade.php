@extends('layouts.master')

@section('page-title', 'Visitor - ' . json_decode($visitor->visitor)->full_name)
@section('page-header', 'Visitor - ' . json_decode($visitor->visitor)->full_name)
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
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                    class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                    class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                    class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                    class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">

    <form method="POST" action="{{ route('apps.ticket-visitor.update', $visitor->id) }}">
            @csrf
            @method('PUT')

        <table class="table table-bordered">
           
            <tbody>
                <tr>
                    <td width="30%">Uniq :</td>
                    <td>
                        {{ $visitor->uniq }}
                    </td>
                </tr>
                <tr>
                    <td>Full Name :</td>
                    <td>
                        {{ json_decode($visitor->visitor)->full_name }}
                    </td>
                </tr>
                <tr>
                    <td>IC / Passport : </td>
                    <td>
                        {{ json_decode($visitor->visitor)->identification_card_number }}
                    </td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td>
                        {{ json_decode($visitor->visitor)->email }}
                    </td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td>
                        {{ json_decode($visitor->visitor)->phone_number }}
                    </td>
                </tr>
                <tr>
                    <td>Ticket Purchase : </td>
                    <td>
                        @foreach(json_decode($visitor->cart) as $key => $ticket)
                        {{ $ticket->ticketType }} {{ $ticket->ticketQuantity }}x @if (!$loop->last), @endif
                        @if(isset($item->shirtSizes))
                        T-Shirt Size:
                        @foreach($item->shirtSizes as $shirt)
                        {{ $shirt }}@if (!$loop->last), @endif
                        @endforeach
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Total Purchase :</td>
                    <td>
                        {{ number_format($visitor->overallTotal, 2) }}
                    </td>
                </tr>
                <tr>
                    <td>Status :</td>
                    <td>
                        <span class="badge {{ $visitor->payment_status == 1 ? 'bg-primary' : 'bg-danger' }}">
                            {{ $visitor->payment_status == 1 ? 'Paid' : 'Unpaid' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Redeem Status :</td>
                    <td>
                        <div class="form-group">
                            <select name="redeem_status" id="redeem_status" class="form-control">
                                <option value="" selected disabled>Please Select</option>
                                <option value="1" {{ $visitor->redeem_status == 1 ? 'selected' : '' }}>Redeemed</option>
                                <option value="2" {{ $visitor->redeem_status == 2 ? 'selected' : '' }}>Not Redeemed</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Action :</td>
                    <td>
                        <a data-fancybox
                            href="{{ asset('assets/upload/' . $visitor->uniq . '_' . json_decode($visitor->visitor)->identification_card_number)  . '.pdf' }}"
                            class="btn btn-sm btn-blue my-n1">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            
        </table>

        <button type="submit" class="btn btn-success w-90px">Save</button>
        <a href="{{ url('ticket-visitor') }}" class="btn btn-yellow w-90px">Back</a>

    </form>

   </div>
</div>

@endsection

@push('script')

@endpush