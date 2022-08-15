<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_GET['class_no'])) {
        $class_no = $_GET['class_no'];
        $sql = "DELETE FROM class WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($class_no));
        
        header('Location: classes.php');
        exit;
    }
?>