@extends('layouts.app')

@section('content')

    <table class = "table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>

    <tbody>
        <td>
            {{auth()->user()->name}}
        </td>
        <td>
            {{auth()->user()->email}}
        </td>
    <tbody>
@endsection
