<?php
// Include your database connection file here
include("connection_request.php");

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['User_name'];
    $loginid = $_POST['Login_Id'];
    $password = $_POST['Password'];
    $mobile = $_POST['Mobile'];

    $sql = "INSERT INTO supplier_signup (User_name,Login_Id,Password,Mobile) VALUES ('$name','$loginid','$password','$mobile')";
    

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo "<script>
                alert('Signup successful');
                window.location.href = 'supplier_page.php';
              </script>";
    } else {
        // Error handling
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'signup.html';
              </script>";
    }
    mysqli_close($conn);
}
?>


