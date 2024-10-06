<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body{
            background-color: red;
        }
        .card{
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 15px;
            
        }
        .card:hover{
            transform: translate(0px, -8px);
        }
        .card-img-top{
            width: 250px;
            height: 200px;
        }
        .card-title{
            font-size: 40px;
            font-weight: bold;

        }
        .card-subtitle{
            font-size: 20px;
        }
        .btn{
            justify-content: center;
            align-items: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
<?php 
    include "authguard.php";
    include "menu.html";
    include "../shared/connection.php";

    $sql_result = mysqli_query($conn, "select * from product");
            echo "<div class='container m-5'>";
            echo "<div class='row g-4'>";
            echo "<h1 class='text-center text-primary mt-1'>Latest Products</h1>";
            while ($dbrow = mysqli_fetch_assoc($sql_result)) {
                echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; 
                echo "<div class='card h-100'>"; 
                echo "<img src='$dbrow[impath]' class='card-img-top' alt='Product Image'>"; 
                echo "<div class='card-body'>
                        <h4 class='card-title text-center text-danger'>$dbrow[name]</h4>
                        <h5 class='card-subtitle mb-2 text-muted text-center'><span>Rs </span>$dbrow[price]</h5>
                        <p class='card-text text-center'>$dbrow[detail]</p>
                        <div class='text-center'>
                            <a href='addcart.php?pid=$dbrow[pid]'>
                            <button type='button' class='btn btn-outline-success'>Add to Cart</button>
                        </a>                      
                        </div>
                    </div>"; 
                echo "</div>"; 
                echo "</div>"; 
            }
?>
    
</body>
</html>



<?php 

include "../shared/footer.html";

?>