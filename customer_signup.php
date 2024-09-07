<?php
// Include your database connection file here
include("connection_request.php");

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['User_name'];
    $login_id = $_POST['Login_Id'];
    $password = $_POST['Password'];
    $mobile = $_POST['Mobile'];

    $sql = "INSERT INTO customer_signup (User_name, Login_Id, Password, Mobile) VALUES ('$user_name', '$login_id', '$password', '$mobile')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo "<script>
                alert('Signup successful');
                window.location.href = 'customer_page.php';
              </script>";
    } else {
        // Error handling
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'signup.html';
              </script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
