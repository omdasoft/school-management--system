<?php
    error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $subject_name = "";
        $subject_name = test_input($_POST['subject_name']);
        $sql = "INSERT INTO subjects (name) values (?)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($subject_name));
        header('Location: subjects.php');
        exit;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>