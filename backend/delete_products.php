<?php
    require_once("../config/helper.php");

    $id = $_POST['id'];
    $runQuery = mysqli_query($connection, "DELETE FROM products WHERE
    id = '$id'");

    $_SESSION['updated'] = true;
    header('Location: '. BASE_URL. 'frontend/dashboard/pages/products.php');
?>