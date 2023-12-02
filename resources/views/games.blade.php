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
            <th>Devices</th>
            <th>Images</th>
        </tr>
        <tbody>
        @foreach ($games as $game)
            <tr>
                <td>{{ $game->name }}</td>
                <td>{{ $game->Description }}</td>
                <td>{{ $game->devices }} </td>
                <td>
                    <img src="{{ asset('img')}} / {{ $game->banner_image }}" alt= "Image from db"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
