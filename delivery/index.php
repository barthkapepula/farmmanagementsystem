<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Delivery Page - Farm Delivery System</title>
    <!-- Add your CSS stylesheets and Bootstrap here -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <!-- Delivery Form -->
        <div id="delivery-form">
            <form id="delivery-form">
                <label for="category">Select Category:</label>
                <select id="category" name="category" onchange="loadItems()">
                    <option value="">Select Category</option>
                    <option value="animals">Animals</option>
                    <option value="fruits">Fruits</option>
                    <option value="vegetables">Vegetables</option>
                    <option value="others">Others</option>
                </select>

                <label for="item">Select or Type Item:</label>
                <input type="text" id="item" name="item" placeholder="Enter or select item" required>

                <label for="quantity">Quantity:</label>
                <input type="text" id="quantity" name="quantity" placeholder="Enter quantity" required>

                <label for="unit">Select Unit:</label>
                <select id="unit" name="unit" onchange="calculatePrice()" required>
                    <option value="kg">Kilograms (kg)</option>
                    <option value="item">Item</option>
                </select>

                <label for="price">Price (ZMW):</label>
                <div class="price-container">
                    <span class="currency-symbol">ZMW</span>
                    <input type="number" id="price" name="price" min="20" oninput="validatePrice()" required>
                </div>

                <label for="address">Destination Address:</label>
                <textarea id="address" name="address" placeholder="Enter destination address" required></textarea>

                <button type="button" onclick="submitDelivery()">Submit Delivery</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="delivery.js"></script>
</body>

</html>
