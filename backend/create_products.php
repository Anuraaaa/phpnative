<?php
    require_once("../config/helper.php");

    $code = generateRandomString(5);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $kategori = $_POST['kategori'];
    $user = $_SESSION['id'];
    $date = date("d/m/y H:m:s");

    $runQuery = mysqli_query($connection, "INSERT INTO products
    (code, name, price, category, users_by, created_at) VALUES ('$code', '$name', '$price', '$kategori', '$user', '$date')");

    $_SESSION['updated'] = true;
    header('Location: '. BASE_URL. 'frontend/dashboard/pages/products.php');
?>