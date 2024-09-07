<?php
// Include your database connection file here
include("connection_request.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $product_type = $_POST['product_type'];
    $price = $_POST['price'];
    $quantity=$_POST['quantity'];

    // Insert product into the database
    // $query = "INSERT INTO add_product (product_name, product_id, product_type, price) VALUES ('$product_name', '$product_id', '$product_type', '$price')";

    $query = "INSERT INTO add_product (product_name, product_id, product_type, price, quantity) VALUES ('$product_name', '$product_id', '$product_type', '$price', '$quantity')";

    if (mysqli_query($conn, $query)) {
        // echo "Product added successfully.";
        echo "<script>
        alert('Product added successfully');
        window.location.href = 'adminhome.html';
      </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
