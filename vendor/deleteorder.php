<?php

include "../shared/connection.php";

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("DELETE FROM orders WHERE orderid = ?");
    $stmt->bind_param("i", $order_id);


    if ($stmt->execute()) {

        header("Location: order.php?message=Order deleted successfully.");
    } else {

        header("Location: order.php?error=Failed to delete order.");
    }

    $stmt->close();
}

$conn->close();
?>
