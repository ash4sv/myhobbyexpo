@extends('layouts.master')

@section('page-title', 'Register')
@section('page-header', 'Register')
@section('description', '')

@section('content')

    @foreach($registers as $register)
        {{ $register->full_name }} <br> {{ $register->nickname }}<br>
        @foreach($register->numberRegister as $number)
            {{ $number->register }} <br>
        @endforeach
    @endforeach

@endsection
