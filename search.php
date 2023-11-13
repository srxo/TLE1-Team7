<?php
// Read the JSON file content
$jsonFile = 'data.json';
$jsonData = file_get_contents($jsonFile);

// Decode JSON data
$data = json_decode($jsonData, true);

// Get the search term from the form
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

// Perform a simple case-insensitive search
$results = [];
foreach ($data as $item) {
    // Change the condition based on your search requirements
    if (stripos($item['name'], $searchTerm) !== false) {
        $results[] = $item;
    }
}

// Display search results
echo '<h2>Search Results:</h2>';
if (empty($results)) {
    echo 'No results found.';
} else {
    echo '<ul>';
    foreach ($results as $result) {
        // Generate a link for each result
        echo '<li><a href="details.php?id=' . urlencode($result['name']) . '">' . $result['name'] . '</a></li>';
    }
    echo '</ul>';
}
?>
