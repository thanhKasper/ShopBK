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

$conn->query("ALTER TABLE Products MODIFY COLUMN rating DOUBLE(2,1)");

$createProduct = "CREATE TABLE Products (
product_id INT PRIMARY KEY,
product_name VARCHAR(512) NOT NULL,
price INT NOT NULL,
rating DOUBLE(1,1) DEFAULT 0,
image_dir VARCHAR(128),
description VARCHAR(1048576) DEFAULT '',
CHECK (price >= 0)
)";

$createUser = "CREATE TABLE Users (
user_id INT PRIMARY KEY,
username varchar(64) not null,
email varchar(64),
password char(64) not null
)";

if ($conn->query($createProduct) === TRUE) {
    echo "Successfully add Products table";
} else {
    echo $conn->error;
}

if ($conn->query($createUser) === TRUE) {
    echo "Successfully add Users table";
} else {
    echo $conn->error;
}


?>
