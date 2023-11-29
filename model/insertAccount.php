<?php 
function insertAccount($username, $email, $hashPass) {
    $conn = new mysqli('localhost', 'root', '', 'onlinestore');
    // Get the latest userID
    $sql = "
    SELECT MAX(user_id)
    FROM Users
    ";
    
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
    $nextID = $data['MAX(user_id)'] + 1;

    $sql = "
    INSERT INTO users VALUES
    ($nextID, '$username', '$email', '$hashPass', 2);
    ";
    $conn->query($sql);
}

// insertAccount("Thanh", "mail@mail.org", "djklgs");
?>