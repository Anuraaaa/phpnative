<?php 
  // Connection
  include_once('../config/helper.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login  | <?= app('name') ?></title>
    <link rel="stylesheet" href="<?= BASE_URL.'vendor/bootstrap5-3.min.css' ?>">

    <style>
        .card {
            margin-top: 100px;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-header">
                        Login to dashboard
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Aplikasi Warehouse</h5>
                        <p class="card-text text-muted">Version <?= app('version') ?></p>
                       
                        <hr>

                        <?php
                            if (isset($_SESSION['auth']) && $_SESSION['auth'] === false) {
                               echo("
                                <div class='alert alert-danger'>
                                    Maaf, password salah
                                </div>");
                                unset($_SESSION['auth']);
                            }
                            else if (isset($_SESSION['auth']) && $_SESSION['auth'] !== false) {
                                echo("
                                <div class='alert alert-danger'>
                                Maaf, akun belum terdaftar!
                                </div>");
                                unset($_SESSION['auth']);
                            }
                        ?>

                       

                        <form action="<?= BASE_URL.'backend/auth.php' ?>" method="POST">
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="inputUsername">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="inputPassword">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>