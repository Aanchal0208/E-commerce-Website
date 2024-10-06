<?php 

include "authguard.php";
include "menu.html";
include "../shared/connection.php";


if (!isset($_SESSION['userid'])) {
    die("Error: User not logged in.");
}


$userid = $_SESSION['userid'];
$sql = "SELECT product.name, product.price 
        FROM cart 
        JOIN product ON cart.pid = product.pid 
        WHERE cart.userid = '$userid'";
$result = mysqli_query($conn, $sql);


$totalPrice = 0;
$productDetails = [];


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productDetails[] = $row['name'];
        $totalPrice += $row['price'];
    }
} else {
    echo "<div class='text-center h2 text-primary mt-3'>No Products Found In Your Cart.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Track Order</title>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="uploadorder.php" method="post" class="w-50 bg-white p-4" enctype="multipart/form-data">
        <h3 class="text-center">Place Orders</h3>
        
        <input class="form-control mt-3" type="text" name="name" placeholder="Enter your Name" required>
        <input class="form-control mt-2" type="email" name="email" placeholder="Enter your Email" required>
        <input class="form-control mt-3" type="number" name="number" placeholder="Enter your Number" required>
        <textarea class="form-control mt-2" name="address" cols="30" rows="3" placeholder="Full Address" required></textarea>

        <input type="hidden" name="products" value="<?php echo htmlspecialchars(implode(", ", $productDetails)); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($totalPrice); ?>">


        <div class="mt-3">
            <h5>Products:</h5>
            <p><?php echo htmlspecialchars(implode(", ", $productDetails)); ?></p>
            <h5>Total Price: Rs <?php echo htmlspecialchars($totalPrice); ?></h5>
        </div>

        
        <label for="payment" class="mt-2">Payment Method:</label>
        <select class="form-control" name="payment" id="payment" required>
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="PayPal">PayPal</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Paytm">Paytm</option>
        </select>

        <div class="text-center mt-3">
            <button class="btn btn-danger">Place Order</button>
        </div>
    </form>
</div>

</body>
</html>

<?php 
include "../shared/adminfooter.html";
?>
