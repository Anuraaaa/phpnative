<?php
    include("../config/helper.php");

    parr($_REQUEST);

    
    
    if(empty($_SESSION) === false) {
        session_destroy();
        header("Location: ".  BASE_URL. 'frontend/login.php');
    }
    else {
        $username = $_POST['username'];
        $password = $_POST['password'];
 
        $runQuery = mysqli_query($connection, "SELECT * FROM users WHERE
        
        username = '$username'");
    
        if(mysqli_num_rows($runQuery) === 1) {
            $dataUser = mysqli_fetch_assoc($runQuery);
            
            if (password_verify($password, $dataUser['password'])) {
                unset($dataUser['password']);
                $_SESSION['auth'] = $dataUser;
                $_SESSION['name'] = $dataUser['username'];
                $_SESSION['id'] = $dataUser['id'];
                header("Location: ". BASE_URL. 'frontend/dashboard/pages/index.php');
            }
            else {
                $_SESSION['auth'] = false;
                header("Location: ". BASE_URL. 'frontend/login.php');
            }
        }
        else {
            $_SESSION['auth'] = 'noregist';
            header("Location: ". BASE_URL. 'frontend/login.php');
        }
    }

?>