<?php 
session_start();
include "../shared/connection.php";


if (!isset($_GET['pid'])) {
    die("Error: Product ID not found.");
}

$pid = $_GET['pid'];
$sql = "SELECT * FROM product WHERE pid = '$pid'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    die("Error: Product not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
       
body {
    background-color: #f8f9fa; 
    font-family: Arial, sans-serif; 
}


.container {
    background-color: white; 
    border-radius: 8px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
    padding: 20px; 
}


h2 {
    color: #dc3545;
    font-weight: bold;
    font-size: 40px; 
}


.form-control {
    border: 1px solid #ced4da; 
    border-radius: 5px; 
    transition: border-color 0.3s ease; 
}

.form-control:focus {
    border-color: #dc3545; 
    box-shadow: 0 0 5px rgba(220, 53, 69, 0.5); 
}

.btn {
    border-radius: 5px; 
    padding: 10px 15px; 
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #dc3545; 
    border: none;
}

.btn-primary:hover {
    background-color: #c82333; 
}

.btn-secondary {
    background-color: #6c757d; 
    border: none; 
}

.btn-secondary:hover {
    background-color: #5a6268; 
}


.img-thumbnail {
    border-radius: 5px;
}

    </style>
    <title>Edit Product</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Product</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="pname" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="pname" name="pname" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="pprice" class="form-label">Product Price (in Rs)</label>
        <input type="number" step="0.01" class="form-control" id="pprice" name="pprice" value="<?= htmlspecialchars($product['price']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="pdetail" class="form-label">Product Details</label>
        <textarea class="form-control" id="pdetail" name="pdetail" rows="3" required><?= htmlspecialchars($product['detail']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="pdtimg" class="form-label">Product Image (Optional)</label>
        <input type="file" class="form-control" id="pdtimg" name="pdtimg">
        <small class="form-text text-muted">Current image: <img src="<?= htmlspecialchars($product['impath']) ?>" alt="Product Image" width="100" class="img-thumbnail mt-1"></small>

        <input type="hidden" name="currentImage" value="<?= htmlspecialchars($product['impath']) ?>">

        <input type="hidden" name="pid" value="<?= htmlspecialchars($product['pid']) ?>">
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="view.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
