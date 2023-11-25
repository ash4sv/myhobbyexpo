@extends('layouts.master')

@section('page-title', 'Exhibition Section')
@section('page-header', 'Exhibition Section')
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
                        <td>Hall :</td>
                        <td>
                            {{ $section->hall->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Name Section : </td>
                        <td>{{ $section->name }}</td>
                    </tr>
                    <tr>
                        <td width="30%"></td>
                        <td>
                        <a href="{{ asset($section->poster) }}" data-fancybox data-src="{{ asset($section->poster) }}" data-caption="{{ $section->name }}">
                            <img src="{{ asset($section->poster) }}" alt="" class="h-60px">
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%"></td>
                        <td>
                        <a href="{{ asset($section->layout) }}" data-fancybox data-src="{{ asset($section->layout) }}" data-caption="{{ $section->name }}">
                            <img src="{{ asset($section->layout) }}" alt="" class="h-60px">
                        </a>
                    </td>
                    </tr>
                    <tr>
                        <td>Booths:</td>
                        <td>
                        @if(count($section->numbers) > 0)
                            <div class="progress progress-striped">
                                <div class="progress-bar bg-warning" style="width:{{ (count($section->numbers->where('status', 1)) / count($section->numbers)) * 100 }}%">{{ (count($section->numbers->where('status', 1)) / count($section->numbers)) * 100 }}%</div>
                            </div>
                        @endif
                        <p class="mb-0">{{ count($section->numbers->where('status', 1)) }} / {{ count($section->numbers) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                        <span class="badge {{ $section->status == 1 ? 'bg-primary' : 'bg-danger' }}">
                            {{ $section->status == 1 ? 'Enable' : 'Disable' }}
                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Coming Soon :</td>
                        <td>
                        <span class="badge {{ $section->coming_soon == 1 ? 'bg-primary' : 'bg-danger' }}">
                            {{ $section->coming_soon == 1 ? 'Enable' : 'Disable' }}
                        </span>
                    </td>
                    </tr>
                    
                </tbody>
            </table>

            <a href="{{ url('exhibition/section') }}" class="btn btn-indigo btn-lg w-150px">Back</a>

        </div>
    </div>

@endsection

@push('script')

@endpush
