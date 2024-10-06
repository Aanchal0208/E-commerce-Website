<?php

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$number = $_POST['number'];
$products = $_POST['products'];
$price = $_POST['price'];
$payment = $_POST['payment'];


include "../shared/connection.php";

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


$name = $conn->real_escape_string($name);
$address = $conn->real_escape_string($address);
$email = $conn->real_escape_string($email);
$number = $conn->real_escape_string($number);
$products = $conn->real_escape_string($products);
$price = $conn->real_escape_string($price);
$payment = $conn->real_escape_string($payment);


$sql = "INSERT INTO orders (name, address, email, number, products, price, payment) VALUES ('$name', '$address', '$email', '$number', '$products','$price', '$payment')";


if ($conn->query($sql) === TRUE) {
    header("Location: placeorders.php?pid=$pid");
        exit; 
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
