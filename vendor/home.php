<?php 
include "authguard.php";
include "menu.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="upload.php" method="post" class="w-50 bg-white p-4" enctype="multipart/form-data">
        <h3 class="text-center">Upload Products</h3>
        <input class="form-control mt-3" type="text" name="pname" placeholder="Product Name">
        <input class="form-control mt-2" type="number" name="pprice" placeholder="Product Price">
        <textarea class="form-control mt-2" name="pdetail" cols="30" rows="3" placeholder="Product Description"></textarea>
        <input name="pdtimg" class="form-control mt-2" type="file" accept=".jpg, .png, .jpeg">
        <div class="text-center mt-3">
            <Button class="btn btn-danger">Upload Product</Button>
        </div>
    </form>
    </div>
</body>
</html>


<?php 

include "../shared/adminfooter.html";

?>