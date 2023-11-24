<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<h2>Details for {{ $details->name }}:</h2>
@isset($details)
    <p>Name: {{ $details->name }}</p>
    <p>Description: {{ $details->description }}</p>
@else
    <p>Item not found.</p>
@endisset
</body>
</html>

