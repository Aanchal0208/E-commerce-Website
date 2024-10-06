<?php

session_start();

// $conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

include "../shared/connection.php";

$source = $_FILES['pdtimg']['tmp_name'];
$target = "../shared/images/" . $_FILES['pdtimg']['name'];

move_uploaded_file($source, $target);
mysqli_query($conn, "insert into product(name,price,detail,impath,owner) values(
'$_POST[pname]',
$_POST[pprice],
'$_POST[pdetail]',
'$target',
$_SESSION[userid]

)");

header("location:view.php");    
?>

<?php
include "../shared/connection.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pdetail = $_POST['pdetail'];
    $currentImage = $_POST['currentImage']; 
    $pid = $_POST['pid'];

    $targetDir = "../shared/images/";
    $uploadOk = 1;


    if (!empty($_FILES["pdtimg"]["name"])) {
        $targetFile = $targetDir . basename($_FILES["pdtimg"]["name"]);
        

        $check = getimagesize($_FILES["pdtimg"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }


        if ($_FILES["pdtimg"]["size"] > 5000000) { 
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }


        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["pdtimg"]["tmp_name"], $targetFile)) {
                $currentImage = $targetFile;
            } else {
                echo "Error: Failed to upload image.";
            }
        }
    }


    $sql = "UPDATE product 
            SET name = '$pname', price = '$pprice', detail = '$pdetail', impath = '$currentImage' 
            WHERE pid = '$pid'";


    if (mysqli_query($conn, $sql)) {
        header("Location: view.php?pid=$pid");
        exit;
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
