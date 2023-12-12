@extends('layouts.app')

@section('content')

    <form action="{{ route('games.index') }}" method="get">
        @csrf
        <input type="text" name="search" placeholder="Search cards">
        <select name="category[]" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
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
                <td>{{ $game->description }}</td>
                <td>{{ $game->devices }} </td>
                <td>
                    @foreach($game->genres as $genre)
                        {{ $genre->name}}
                    @endforeach
                </td>
                <td>
                    <img alt="Image from db" src="{{url('/img/games/' . $game->banner_image)}}"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
