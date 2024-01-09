<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
<h2>Search Results:</h2>
@if ($results->isEmpty())
    <p>No results found.</p>
@else
    <ul>
        @foreach ($results as $result)
            <!-- Update the link to use the ID from the database -->
            <li><a href="{{ route('details', $result->id) }}">{{ $result->name }}</a></li>
        @endforeach
    </ul>
@endif
</body>
</html>
