<?php

include "../shared/connection.php";

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id']; 
    $status = $_POST['status']; 

    $order_id = intval($order_id); 
    $status = $conn->real_escape_string($status); 

    $sql = "UPDATE orders SET status = '$status' WHERE orderid = $order_id";

    if ($conn->query($sql) === TRUE) {
        echo "Order status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }


}
?>
