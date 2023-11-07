<?php
$servername = "localhost";
$username = "root";
$password = "";

//Create a connection to database
$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection Fail: " . $conn->connect_error);
}
else {
    echo "Connected successfully\n";
}


//Create a database
$sql = "CREATE DATABASE OnlineStore";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error in creating a database: " . $conn->error . "\n";
}

$conn->close();
?>