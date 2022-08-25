<?php
    session_start();
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = ? and password = ? LIMIT 1";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($username,$password));
        $user = $stmt->fetch();
        $count = $stmt->rowCount();
        if($count > 0) {
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit;
        }else{
            $message = "username or password are incorrect";
            $_SESSION['login-error'] = $message;
            header('Location: login-form.php');
            exit;
        }
        
    }
?>