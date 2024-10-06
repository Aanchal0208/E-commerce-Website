<?php
    include "../shared/connection.php";


if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid']; 

    $delete_query = "DELETE FROM cart WHERE cartid = $cartid";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        echo "Item removed from cart successfully!";
        
    } else {
        echo "Failed to remove item: " . mysqli_error($conn);
    }

    header("Location:viewcart.php");
} else {
    echo "Invalid request.";
}
?>
