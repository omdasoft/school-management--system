<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM teachers WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));

        header('Location: teachers.php');
        exit;
    }
?>