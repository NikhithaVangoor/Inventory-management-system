<?php
// Include your database connection file here
include("connection_request.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];

    // Delete product from the database
    $query = "DELETE FROM add_product WHERE product_name = '$product_name' OR product_id = '$product_id'";

    if (mysqli_query($conn, $query)) {
        //echo "Product deleted successfully.";
        echo "<script>
        alert('Product deleted successfully');
        window.location.href = 'adminhome.html';
      </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
