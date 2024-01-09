@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ auth()->user()->name }}</td>
                <td>{{ auth()->user()->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
