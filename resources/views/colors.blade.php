<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Toggle</title>
    @vite(['resources/scss/colors.scss', 'resources/js/app.js', 'resources/css/app.css'])
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
        if (currentColor === 'light') {
            body.classList.remove('light-mode');
            body.classList.toggle('dark-mode');
        }
        if (currentColor === 'dark') {
            body.classList.remove('dark-mode');
            body.classList.toggle('light-mode');
        }
        // Save the current color mode to local storage
        localStorage.setItem('colorMode', currentColor);
    }

    // Apply the saved color mode on page load
    document.addEventListener('DOMContentLoaded', function () {
        const savedColorMode = localStorage.getItem('colorMode');
        if (savedColorMode !== 'dark') {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }

        if (savedColorMode === 'dark') {
            document.body.classList.add('light-mode');
        } else {
            document.body.classList.remove('light-mode');
        }
    });
</script>

</body>
</html>
