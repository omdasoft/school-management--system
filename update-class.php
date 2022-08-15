<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = test_input($_POST['class_name']);
        $sql = "UPDATE class SET name = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($name,$id));
        
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