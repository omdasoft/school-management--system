<?php
    error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $class_id = $_POST['class_id'];
        $subject_ids = $_POST['subject_id'];
        $sql = "INSERT INTO class_subjects (class_id, subject_id) values (?,?)";
        $stmt = $con->prepare($sql);
        foreach($subject_ids as $sub_id) {
            $stmt->execute(array($class_id, $sub_id));
        }

        header('Location: class-subjects.php?class_no='.$class_id);
        exit;
    }
?>