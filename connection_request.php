<?php
$servername = "localhost"; // Replace with your database servername
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "inven"; // Replace with your desired database name

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists
if (!$conn->select_db($dbname)) {
    // Create the database if it doesn't exist
    $createDbQuery = "CREATE DATABASE $dbname";
    if ($conn->query($createDbQuery) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
        $conn->close();
        exit();
    }
}

// Close the current connection
//$conn->close();

// Reconnect to the created database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection after reconnecting
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
//echo "Connected successfully to the database";

// Close the connection when done
//$conn->close();
?>
