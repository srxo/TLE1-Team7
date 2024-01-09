@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Naam</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control">
                @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Beschrijving</label>
                <input id="description" type="text" name="description" value="{{ old('description') }}" class="form-control">
                @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="devices" class="form-label">Devices</label>
                <select id="devices" name="devices" class="form-control">
                    <option value="PC">PC</option>
                    <option value="XBOX">XBOX</option>
                    <option value="Playstation">Playstation</option>
                    <option value="Mobile">Mobile</option>
                    <option value="NintendoSwitch">NintendoSwitch</option>
                </select>
                @error('devices')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select name="genre_id[]" class="form-control" multiple id="genreSelect">
                    <option value="" disabled selected>Kies tot twee opties</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input id="image" type="file" name="image" value="{{ old('image') }}" class="form-control">
                @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#genreSelect').on('change', function () {
                let selectedCount = $(this).val() ? $(this).val().length : 0;

                if (selectedCount > 2) {
                    $(this).val($(this).val().slice(0, 2));
                }
            });
        });
    </script>
@endsection
