<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5d8da1;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color:#191a16;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; /* Table background color */
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            background-color: #191a16;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        h1 {
            text-align: center;
            color:#f1f3f0;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Products</h1>
        <?php
        // Include your database connection file here
        include("connection_request.php");

        // Query to retrieve all products
        $query = "SELECT * FROM add_product";
        $result = mysqli_query($conn, $query);

        // Check if there are products
        if (mysqli_num_rows($result) > 0) {
            // Display products in a table
            echo "<table>";
            echo "<tr><th>Product Name</th><th>Product ID</th><th>Product Type</th><th>Price</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_type'] . "</td>";
                echo "<td>$" . $row['price'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No products found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
        <div style="text-align: center; margin-top: 20px;">
            <a href="adminhome.html"><button>Go to Admin Home Page</button></a>
        </div>
    </div>
</body>
</html>
