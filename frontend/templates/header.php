<?php 
  // Connection
  include_once('../../../config/helper.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app['name'] ?></title>
    <link rel="stylesheet" href="<?= BASE_URL.'vendor/bootstrap5-3.min.css' ?>">

    <style>
        header {
            padding: 50px;
        }
        .content {
            min-height: 411px;
        }
        .bgme-f {
            background-color: chocolate;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
        <header class="bg-success text-center">
            <h1 class="text-white">Selamat Datang, User</h1>

            <a href="<?= BASE_URL.'backend/auth.php' ?>" class="btn btn-danger">Logout</a>
        </header>

        <?php 
            include_once('sidebar.php');
        ?>