<?php
// Include your database connection file here
include("connection_request.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $material_type = $_POST['material_type'];
    $material_id = $_POST['material_id'];
    $quantity = $_POST['quantity'];

    // Process the request (e.g., insert into database, send notification, etc.)
    // For example, insert the request into a "requests" table
    $query = "INSERT INTO requests (material_type, material_id, quantity) VALUES ('$material_type', '$material_id', '$quantity')";

    if (mysqli_query($conn, $query)) {
        //echo "Request submitted successfully.";
        echo "<script>
        alert('Request submitted successfully.');
        window.location.href = 'adminhome.html';
      </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
