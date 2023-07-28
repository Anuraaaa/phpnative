<?php
    require_once("../config/helper.php");

    $name = $_POST['name'];
    $price =$_POST['price'];
    $kategori = $_POST['category'];
    
    $runQuery = mysqli_query($connection, "UPDATE products 
    SET name = '$name', price = '$price', category = '$kategori' WHERE id = '$id'");

    $_SESSION['updated'] = true;
    header('Location: '. BASE_URL. 'frontend/dashboard/pages/products.php');
?>