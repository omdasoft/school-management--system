<?php
    error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $class_id = $_POST['class_id'];
        $subject_ids = $_POST['subject_id'];
        $sql = "INSERT INTO class_subjects (class_id, subject_id) values (?,?)";
        $stmt = $con->prepare($sql);

        // $sql = "SELECT subject_id from class_subjects where class_id = ?";
        // $stmt = $con->prepare($sql);
        // $stmt->execute(array($class_id));
        // $current_subjects = $stmt->fetchAll();
        // $current_sub_ids = [];
        // foreach($current_subjects as $key => $sub) {
        //     array_push($current_sub_ids, $sub['subject_id']);
        // }
        foreach($subject_ids as $sub_id) {
            $stmt->execute(array($class_id, $sub_id));
        }

        header('Location: class-subjects.php?class_no='.$class_id);
        exit;
    }
?>