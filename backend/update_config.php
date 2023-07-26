<?php
    require_once("../config/helper.php");

    $name_app = $_POST['name'];
    $desctiption =$_POST['description'];
    $version = $_POST['version'];


    $runQuery = mysqli_query($connection, "UPDATE config_app 
    SET name = '$name', description = '$desctiption', version = '$version'");

    $_SESSION['updated'] = true;
    header('Location: '. BASE_URL. 'frontend/dashboard/pages/config_app');
?>