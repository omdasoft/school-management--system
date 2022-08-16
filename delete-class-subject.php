<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_GET['class_sub_id'])) {
        $class_sub_id = $_GET['class_sub_id'];
        $sql = "DELETE FROM class_subjects WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($class_sub_id));
       
        header('Location: class-subjects.php?class_no='.$_GET['class_no']);
        exit;
    }
?>