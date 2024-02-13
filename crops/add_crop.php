<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Add Crop - Farm Management System</title>
    <!-- Add your CSS stylesheets and Bootstrap here -->
    <style>
        body {
            background-color: #28a745;
            background-size: cover;
            background-position: center;
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
            color:black;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Add Crop</h2>
        <form action="process_add_crop.php" method="post">
            <label for="name">Crop Name:</label>
            <input type="text" name="name" required>

            <label for="type">Crop Type:</label>
            <input type="text" name="type" required>

            <label for="planting_date">Planting Date:</label>
            <input type="date" name="planting_date" required>

            <label for="harvesting_date">Harvesting Date:</label>
            <input type="date" name="harvesting_date" required>

            <label for="description">Description:</label>
            <textarea name="description"></textarea>

            <button type="submit">Add Crop</button>
        </form>
    </div>
</body>

</html>
