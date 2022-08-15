<?php
    error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $class_name = "";
        $class_name = test_input($_POST['class_name']);
        $sql = "INSERT INTO class (name) values (?)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($class_name));
        header('Location: classes.php');
        exit;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>