<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<h2>Details for {{ $game->name }}:</h2>
@isset($game)
    <p>Name: {{ $game->name }}</p>
    <p>Description: {{ $game->description }}</p>
@else
    <p>Item not found.</p>
@endisset
<h3>Reviews</h3>
<form class="m-md-5" method="POST" action="{{ route('review.store', $game) }}">
    @csrf
    <label for="description">Description</label>
    <input id="description" type="text" class="form-control @error('description')is-invalid @enderror" name="description" value="{{old('description')}}">
    @error('description')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary">
        Post review
    </button>
</form>

</body>
</html>

