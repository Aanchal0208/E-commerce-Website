<?php 
include "authguard.php";
include "../shared/connection.php";
include "menu.html";

$sql_result = mysqli_query($conn, "select * from product where owner='$_SESSION[userid]'");


echo "<h1 class='text-center text-primary mt-1'>View Products</h1>";
while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    
    echo "<div class='pdt'> 
        <h3 class='name text-center text-danger '>$dbrow[name]</h3>
        <h3 class='price text-center'><span>Rs </span>$dbrow[price]</h3>
        <img class='pdt-img' src='$dbrow[impath]'>
        <div class='text-center'>$dbrow[detail]</div>
        <div>
            <div class='text-center mt-2'>
            <a href='update.php?pid=$dbrow[pid]'>
                <button class='editbtn'>Edit</button>
            </a>
            <a href='delete.php?pid=$dbrow[pid]'>
                <button class='deletebtn'>Delete</button>
            </a>
            </div>
        </div>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <style>
        .pdt{
        background-color: white;
        display: inline-block;
        margin: 20px;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
    }
    .pdt:hover{
        transform: translate(0px,-8px);
    }
    .name{
        font-size: 40px;
        font-weight: bold;
    }
    .pdt-img{
        width: 250px;
        height: 250px;
    }
    .editbtn,.deletebtn{
        width: 100px;
        height: 35px;
        border-radius: 20px;
        background-color: orange;
    }
    .editbtn:hover,.deletebtn:hover{
        background-color: red;
    }
    </style>
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php 

include "../shared/adminfooter.html";

?>