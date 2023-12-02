@extends('layouts.app')

@section('content')

    <form action="{{ route('games.index') }}" method="get">
        @csrf
        <input type="text" name="search" placeholder="Search cards">
    </form>

    <table class = "table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->Description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
