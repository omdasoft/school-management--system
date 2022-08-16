<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_GET['subject_no'])) {
        $subject_no = $_GET['subject_no'];
        $sql = "SELECT * FROM class_subjects WHERE subject_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($subject_no));
        $found_subjects = $stmt->rowCount();
        if($found_subjects > 0) {
            $message = "You can not delete this subject because it is added in some class";
            header('Location: subjects.php?message='.$message);
        }
        $sql = "DELETE FROM subjects WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($subject_no));
       
        header('Location: subjects.php');
        exit;
    }
?>