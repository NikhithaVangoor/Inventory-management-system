<?php
// Include your database connection file
include("connection_request.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Query to fetch the product details
    $query = "SELECT * FROM add_product WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch product details
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];
        $product_type = $row['product_type'];
        $price = $row['price'];
        $available_quantity = $row['quantity'];

        // Check if the available quantity is sufficient
        if ($quantity > $available_quantity) {
            // Calculate the total price
            $total_price = $price * $quantity;

            // Update the quantity of the product in the add_product table
            $new_quantity = $available_quantity-$quantity;
            $update_query = "UPDATE add_product SET quantity = '$new_quantity' WHERE product_id = '$product_id'";
            if (mysqli_query($conn, $update_query)) {
                // Order placed successfully
                echo "<script>alert('Order placed successfully.');</script>";
            } else {
                echo "Error updating product quantity: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Insufficient quantity available.');</script>";
        }
    } else {
        echo "Error fetching product details: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
