@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('games.index') }}" method="get" class="mb-3">
            @csrf
            <div class="form-group">
                <label for="search">Search cards:</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search cards" aria-label="Search cards">
            </div>

            <div class="form-group">
                <label for="genre">Select genres:</label>
                <select id="genre" name="genre[]" multiple class="form-control" aria-label="Select genres">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Submit</button>
        </form>

        <table class="table table-warning">
            <thead>
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Beschrijving</th>
                <th scope="col">Devices</th>
                <th scope="col">Genres</th>
                <th scope="col">Foto's</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->description }}</td>
                    <td>{{ $game->devices }}</td>
                    <td>
                        @foreach($game->genres as $genre)
                            {{ $genre->name }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <img alt="Image from db" src="{{ url('/img/games/' . $game->banner_image) }}" aria-label="Game Image" class="img-fluid">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
