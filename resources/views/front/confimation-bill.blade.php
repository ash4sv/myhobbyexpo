@extends('front.layout.master')

@section('reg-form')

<table class="table table-dark">
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
</table>


@endsection
