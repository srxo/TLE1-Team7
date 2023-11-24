<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database search Search</title>
</head>
<body>
<form action="{{ route('search') }}" method="post">
    @csrf
    <label for="searchTerm">Search:</label>
    <input type="text" id="searchTerm" name="searchTerm" required>
    <button type="submit">Search</button>
</form>
</body>
</html>
