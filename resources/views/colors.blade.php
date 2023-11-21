<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Toggle</title>
    <link rel="stylesheet" href="../css/colors.scss">
</head>
<body>

<div class="container">
    <h1>Color Toggle</h1>
    <button class="btn-toggle" onclick="toggleColors()">Toggle Colors</button>
    <div id="content">
        <!-- Filler text goes here -->
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
    </div>
</div>

<script>
    function toggleColors() {
        const body = document.body;
        const currentColor = body.classList.contains('dark-mode') ? 'dark' : 'light';

        // Toggle between light and dark mode
        body.classList.toggle('dark-mode');

        // Save the current color mode to local storage
        localStorage.setItem('colorMode', currentColor);

        // Reload the page
        location.reload();
    }

    // Apply the saved color mode on page load
    document.addEventListener('DOMContentLoaded', function () {
        const savedColorMode = localStorage.getItem('colorMode');
        if (savedColorMode === 'dark') {
            document.body.classList.add('dark-mode');
        }
    });
</script>

</body>
</html>
