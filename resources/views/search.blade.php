<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
<h2>Search Results:</h2>
@if (empty($results))
    <p>No results found.</p>
@else
    <ul>
        @foreach ($results as $result)
            <!-- Update the link to encode the item name in the URL -->
            <li><a href="{{ route('details', urlencode($result['name'])) }}">{{ $result['name'] }}</a></li>
        @endforeach
    </ul>
@endif
</body>
</html>
