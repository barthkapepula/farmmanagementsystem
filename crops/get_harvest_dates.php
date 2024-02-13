<?php
// Include the database connection file
include 'init_database.php';

// Fetch upcoming harvest dates from the "crops" table
$sql = "SELECT name, harvesting_date FROM crops WHERE harvesting_date >= CURDATE() ORDER BY harvesting_date";
$result = $conn->query($sql);

$harvestDates = [];

// Process the result set
while ($row = $result->fetch_assoc()) {
    $harvestDates[] = [
        'name' => $row['name'],
        'date' => $row['harvesting_date'],
    ];
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($harvestDates);

// Close the database connection
$conn->close();
?>
