<?php
$conn = new mysqli("localhost", "root", "", "onlineStore");

if (!$conn->connect_error) {
    echo "Connect to database successfully\n\r";
}

$insertIphone = "INSERT INTO Products 
VALUES (1, 
'IPhone 15 Pro Max 1TB', 
46990000, 
4.5, 
'A like-new experience. Backed by a one-year satisfaction guarantee. This Renewed Premium product is shipped and sold by Amazon and has been certified by Amazon to work and look like new. With at least 90% battery life, it comes in deluxe, Amazon-branded packaging and is backed by a one-year warranty and technical support. Learn about Amazon Renewed', 
'/images/iphone15.jpg')";


$laptopInsert = "insert into Products
values (2, 'Laptop Gaming HP Omen 16 b0127TX 4Y0W7PA', 46000000, 
4.7, '【Intel Core i9-12900H Processor】Equipped with Intel Core i9-12900H Processor, 2.5GHz(Up to Turbo Boost 5 GHz, 14 cores, 20 threads), this HP OMEN Gaming Laptop delivers unprecedented processing capabilities for demanding gaming sessions, content creation, and multitasking.', 
'/images/hpOmen.jpg')";


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

$queryProducts = "INSERT INTO Products
VALUES (3, 'Samsung Galaxy A05 128GB', 3090000, 3.8, 'Tận hưởng những công nghệ mới ở tầm giá phải chăng cùng Galaxy A05. Từ diện mạo trẻ trung, năng động đến màn hình rộng lớn 6.7 inch, bộ đôi camera 50MP sắc nét',
'/images/ss-galaxy-a05.jpeg');";

$queryProducts .= "INSERT INTO Products
VALUES (4, 'Xmobile PowerBox P69D', 550000, 4.2, 'Thiết kế đơn giản, màu đen thời thượng, phong cách',
'/images/sac_du_phong.jpg');";

if ($conn->multi_query($queryProducts) === TRUE) {
    echo "Insert two more products";
}

$userEmail = 'kieutienthanh@email.com';
$userPassword = '12345678';
$userName = 'ThanhKieu';
$hashPass = hash("sha256", $userPassword);

$sql = "
INSERT INTO Users
VALUES (1, '$userName', '$userEmail', '$hashPass', 1)
";
if ($conn->query($sql) === TRUE) {
    echo "Successfully add user info";
} else {
    echo $conn->error;
}

?>
