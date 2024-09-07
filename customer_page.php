<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Page</title>
  <style>
    /* General styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('cust_page.png');
      background-size: cover;
      background-position: center;
      color: #343a40;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Page header styles */
    header {
      text-align: center;
      margin-bottom: 40px;
      width: 100%;
    }

    h1 {
      color: #007bff;
      margin-top: 0;
    }

    h2 {
      color: #ffc107;
    }

    /* Product styles */
    .products {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .product {
      width: calc(20% - 20px);
      margin-bottom: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .product:hover {
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .product-content {
      padding: 20px;
    }

    .product h3 {
      margin-top: 0;
      font-size: 20px;
      color: #212529;
    }

    .product p {
      margin: 10px 0;
      font-size: 16px;
      color: #6c757d;
    }

    .product form {
      margin-top: 10px;
    }

    .product form input[type="submit"] {
      padding: 10px 20px;
      background-color: #ffc107;
      color: #212529;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .product form input[type="submit"]:hover {
      background-color: #ffca2c;
    }

    /* Navbar styles */
    .navbar {
      background-color: #007bff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 50px;
    }

    .navbar img {
      width: 58px;
      filter: invert(100%);
      margin-right: 16px;
    }

    .navbar ul {
      margin-left: 20px;
      padding: 0;
      list-style: none;
      display: flex;
      align-items: center;
      font-size: 19px;
    }

    .navbar li {
      margin: 0 10px;
    }

    .navbar li a {
      padding: 3px 3px;
      text-decoration: none;
      color: white;
    }

    .navbar li a:hover,
    .navbar li a.active {
      text-decoration: underline;
      color: grey;
    }

    @media (max-width: 768px) {
      .product {
        width: calc(50% - 20px);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <nav class="navbar">
        <img src="inventory_logo.png" alt="Inventory Logo">
        <div style="flex-grow: 1; text-align: left; font-size: 24px; color: white;">Inventory Management System</div>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="service.html">Services</a></li>
          <li><a href="contacts.html">Contact</a></li>
          <li><a href="home.html">Logout</a></li>
        </ul>
      </nav>
    </header>
    <header>
      <center><h1>Customer Page</h1></center><br><br>
      <h2>Available Products</h2><br><br>
    </header>
    <section class="products">
      <?php
        // Include your database connection file
        include("connection_request.php");

        // Fetch products from the database
        $query = "SELECT * FROM add_product";
        $result = mysqli_query($conn, $query);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
          // Output each product
          while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_type = $row['product_type'];
            $price = $row['price'];
            $quantity = $row['quantity'];

            // Display product information
            echo "<div class='product'>";
            echo "<div class='product-content'>";
            echo "<h3>$product_name</h3>";
            echo "<p><strong>Product Type:</strong> $product_type</p>";
            echo "<p><strong>Price:</strong> $price</p>";
            echo "<p><strong>Quantity:</strong> $quantity</p>";
            echo "<form action='quantity_selection.php' method='post'>"; 
            echo "<input type='hidden' name='product_id' value='$product_id'>";
            echo "<input type='submit' value='Place Order'>";
            echo "</form>";
            echo "</div>"; // Close .product-content
            echo "</div>"; // Close .product
          }
        } else {
          echo "<p>No products found</p>";
        }

        // Close database connection
        mysqli_close($conn);
      ?>
    </section>
    <footer>
      <p>&copy; <?php echo date("Y"); ?> Customer Page</p>
    </footer>
  </div>
</body>
</html>
