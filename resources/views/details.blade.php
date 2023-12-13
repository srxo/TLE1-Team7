<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Details</title>
</head>
<body class="container mt-4">
<h2 class="mb-4">Details for {{ $details->name }}:</h2>
@isset($details)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $details->name }}</h5>
            <p class="card-text">Description: {{ $details->description }}</p>
        </div>
    </div>
@else
    <p class="alert alert-danger">Item not found.</p>
@endisset

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
