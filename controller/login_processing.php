<?php

function hasSQLi($msg) {
    $invalidStr = array("'", "and 1=1", "or 1=1", "--", "AND 1=1", "OR 1=1", ";");
    foreach ($invalidStr as $testStr) {
        if (strpos($msg, $testStr)) return true;
    }
    return false;
}

?>


<?php
session_start();
$username = $_POST['username'];
$pwd = $_POST['password'];

// Detect SQL injection
$unameInjection = hasSQLi($username);
$pwdInjection = hasSQLi($pwd);

// Retrieve the User tables with same password
$conn = new mysqli("localhost", "root", "", "onlinestore");
$hashPassword = hash("sha256", $pwd);

// Find tuple with the same username and password
$sql = sprintf("
SELECT user_id, email, password
FROM Users
WHERE email = '%s' AND password = '%s'", $username, $hashPassword);

$res = $conn->query($sql);

if ($res->num_rows && !$unameInjection && !$pwdInjection) {
    $row = $res->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    header("Location: http://localhost/index.php?page=products");
    exit;
} else {
    $_SESSION['user_id'] = -1;
    // ensure that user don't have to type again
    $_SESSION['prevUname'] = $username;
    $_SESSION['prevPwd'] = $pwd;
    header("Location: http://localhost/index.php?page=login");
    exit;
}
