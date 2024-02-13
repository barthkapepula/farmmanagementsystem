<?php
// Include the database connection file
include 'init_database.php';

// Fetch crop data for the dropdown list
$sql = "SELECT id, name FROM crops";
$result = $conn->query($sql);

// Check for errors in the query
if (!$result) {
    die("Error: " . $conn->error);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Delete Crop - Farm Management System</title>
    <!-- Add your CSS stylesheets and Bootstrap here -->
    <style>
        body {
            background-color: #28a745;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .navbar {
            background-color: #28a745;
            overflow: hidden;
            width: 100%;
            margin-bottom: 20px;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #218838;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #28a745;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: black;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="inventory.php">Upcoming Harvests</a>
        <a href="add_crop.php">Add Crop</a>
        <a href="delete_crop.php">Delete Crop</a>
        <a href="..index.php">View Crops</a>
    </div>

    <div class="container">
        <h2>Delete Crop</h2>
        <form action="process_delete_crop.php" method="post">
            <label for="crop_id">Select Crop to Delete:</label>
            <select name="crop_id" required>
                <?php
                // Populate the dropdown with crop data
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>

            <button type="submit">Delete Crop</button>
        </form>
    </div>
</body>

</html>
