<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "OnlineStore");

if ($conn->connect_error) {
    echo $conn->connect_error;
} else {
    echo "Connect Successfully\n";
}

$createProduct = "CREATE TABLE Products (
product_id INT PRIMARY KEY,
product_name VARCHAR(512) NOT NULL,
price INT NOT NULL,
rating DOUBLE(1,1) DEFAULT 0,
description VARCHAR(1048576) DEFAULT '',
image_dir VARCHAR(128),
CHECK (price >= 0)
)";

if ($conn->query($createProduct) === TRUE) {
    echo "Successfully add Products table";
} else {
    echo $conn->error;
}

$conn->query("ALTER TABLE Products MODIFY COLUMN rating DOUBLE(2,1)");

$createUser = "CREATE TABLE Users (
user_id INT PRIMARY KEY,
username varchar(64) not null,
email varchar(64),
password char(64) not null
)";



if ($conn->query($createUser) === TRUE) {
    echo "Successfully add Users table";
} else {
    echo $conn->error;
}

// Add privilege_level attribute to Users table
// level 1: admin
// Level 2: user
$setAttr = "ALTER TABLE Users ADD privilege_level INT;";
$conn->query(($setAttr));

// Set current user level to 1 (admin)
$sql = "UPDATE Users SET privilege_level = 1 WHERE username = 'imAWebDev'";
$conn->query($sql);
?>
