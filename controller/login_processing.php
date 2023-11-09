<?php
session_start();

$username = $_POST['username'];
$pwd = $_POST['password'];

// Retrieve the User tables with same password
$conn = new mysqli("localhost", "root", "", "onlinestore");
$hashPassword = hash("sha256", $pwd);

// Find tuple with the same username and password
$sql = sprintf("
SELECT user_id, email, password
FROM Users
WHERE email = '%s' AND password = '%s'", $username, $hashPassword);

$res = $conn->query($sql);

if ($res->num_rows) {
    $row = $res->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    header("Location: http://localhost/index.php?page=products");
    exit;
} else {
    $_SESSION['user_id'] = -1;
    header("Location: http://localhost/index.php?page=login");
    exit;
}
?>