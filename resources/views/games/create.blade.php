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
    <input id="devices" type="text" name="devices" value="{{old('devices')}}">
    @error('devices')
        <div>
            {{$message}}
        </div>
    @enderror
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
