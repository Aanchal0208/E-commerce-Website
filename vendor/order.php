<?php

include "authguard.php";
include "menu.html";
include "../shared/connection.php";

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .status.pending {
            color: red;
            font-weight: bold;
        }

        .status.complete {
            color: green;
            font-weight: bold;
        }

        .status.canceled {
            color: orange;
            font-weight: bold;
        }
    </style>
    <title>Your Orders</title>
</head>
<body>

<div class="container">
    <h1 class="text-center text-primary mb-4">All Placed Orders</h1>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Update Status</th>
                    <th>Delete Order</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['orderid']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['number']) ?></td>
                        <td><?= htmlspecialchars($row['products']) ?></td>
                        <td>Rs <?= htmlspecialchars($row['price']) ?></td>
                        <td><?= htmlspecialchars($row['payment']) ?></td>
                        <td>
                            <span class="status <?= htmlspecialchars($row['status']) ?>">
                                <?= htmlspecialchars($row['status']) ?>
                            </span>
                        </td>
                        <td>
                            <form method="POST" action="updateorderstatus.php" style="display: flex; align-items: center;">
                                <input type="hidden" name="order_id" value="<?= htmlspecialchars($row['orderid']) ?>">
                                <select name="status" class="form-select" style="margin-right: 10px;">
                                    <option value="pending" <?= ($row['status'] == 'pending' ? 'selected' : '') ?>>Pending</option>
                                    <option value="complete" <?= ($row['status'] == 'complete' ? 'selected' : '') ?>>Complete</option>
                                    <option value="canceled" <?= ($row['status'] == 'canceled' ? 'selected' : '') ?>>Canceled</option>
                                </select>
                                <input type="submit" value="Update" class="btn btn-primary btn-sm">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="deleteorder.php">
                                <input type="hidden" name="order_id" value="<?= htmlspecialchars($row['orderid']) ?>">
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning text-center">No orders found.</div>
    <?php endif; ?>
</div>

<?php 
$conn->close();
include "../shared/adminfooter.html";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
