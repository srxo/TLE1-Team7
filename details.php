<?php
// Read the JSON file content
$jsonFile = 'data.json';
$jsonData = file_get_contents($jsonFile);

// Decode JSON data
$data = json_decode($jsonData, true);

// Get the selected item ID from the query string
$itemId = isset($_GET['id']) ? urldecode($_GET['id']) : '';

// Find the details of the selected item
$details = null;
foreach ($data as $item) {
    if ($item['name'] === $itemId) {
        $details = $item;
        break;
    }
}

// Display details
echo '<h2>Details for ' . $itemId . ':</h2>';
if ($details) {
    echo '<p>Name: ' . $details['name'] . '</p>';
    echo '<p>Description: ' . $details['description'] . '</p>';
} else {
    echo 'Item not found.';
}
?>
