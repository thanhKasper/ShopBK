<?php
$conn = new mysqli("localhost", "root", "", "onlineStore");

if (!$conn->connect_error) {
    echo "Connect to database successfully\n";
}

$insertIphone = "INSERT INTO Products 
VALUES (1, 
'IPhone 15 Pro Max 1TB', 
46990000, 
4.5, 
'A like-new experience. Backed by a one-year satisfaction guarantee. This Renewed Premium product is shipped and sold by Amazon and has been certified by Amazon to work and look like new. With at least 90% battery life, it comes in deluxe, Amazon-branded packaging and is backed by a one-year warranty and technical support. Learn about Amazon Renewed', 
'./images/iphone15.jpg')";


$laptopInsert = "insert into Products
values (2, 'Laptop Gaming HP Omen 16 b0127TX 4Y0W7PA', 46000000, 
4.7, '【Intel Core i9-12900H Processor】Equipped with Intel Core i9-12900H Processor, 2.5GHz(Up to Turbo Boost 5 GHz, 14 cores, 20 threads), this HP OMEN Gaming Laptop delivers unprecedented processing capabilities for demanding gaming sessions, content creation, and multitasking.', 
'./images/hpOmen.jpg')";

if ($conn->query($insertIphone) === TRUE) {
    echo "Inserted iphone to Products Table.\n";
} else {
    echo $conn->error;
}

if ($conn->query($laptopInsert) === TRUE) {
    echo "Inserted laptop to Products Table.\n";
} else {
    echo $conn->error;
}



?>