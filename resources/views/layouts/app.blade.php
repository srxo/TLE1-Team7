<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>

<script>
    $(document).ready(function () {
        // Show the popup when loading the page
        @if($showWarning)
        $('#ageWarningModal').modal('show');
        @endif
    });
</script>
</body>
</html>

