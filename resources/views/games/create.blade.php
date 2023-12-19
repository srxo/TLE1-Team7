@extends('layouts.app')

@section('content')
<form action="{{route('games.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{old('name')}}">
    @error('name')
        <div>
            {{$message}}
        </div>
    @enderror
    <label for="description">Description</label>
    <input id="description" type="text" name="description" value="{{old('description')}}">
    @error('description')
        <div>
            {{$message}}
        </div>
    @enderror
    <label for="devices">Devices</label>
    <select id="devices" name="devices">
        <option value="PC">PC</option>
        <option value="XBOX">XBOX</option>
        <option value="Playstation">Playstation</option>
        <option value="Mobiel">Mobiel</option>
        <Option value="NintendoSwitch">NintendoSwitch</Option>

    </select>
    @error('devices')
    <div>
        {{ $message }}
    </div>
    @enderror

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id[]" class="form-control" multiple>
            <option value="">Kies tot 2 genres</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <label for="image">Banner Image</label>
    <input id="image" type="file" name="image" value="{{old('image')}}">
    @error('image')
        <div>
            {{$message}}
        </div>
    @enderror
    <button type="submit">
        Submit
    </button>
</form>
@endsection
