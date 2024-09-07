<?php
// Include your database connection file
include("connection_request.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $material_id = $_POST["material_id"];

    // Delete the order from the database
    $query = "DELETE FROM requests WHERE material_id = '$material_id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>
        alert('Request accepted successfully');
        window.location.href = 'supplier_page.php';
      </script>";
    } else {
        echo "Error accepting order: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
