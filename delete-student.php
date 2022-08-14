<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_GET['stud_no'])) {
        $stud_no = $_GET['stud_no'];
        try{
            $con->beginTransaction();
            //get father number from student table
            $sql = "SELECT f_id FROM students WHERE stud_no = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($stud_no));
            $student = $stmt->fetch();
            $num = $stmt->rowCount();

            //delete student data
            $sql = "DELETE FROM students WHERE stud_no = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($stud_no));
            //delete father data
            $sql = "DELETE FROM fathers WHERE f_no = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($student['f_id']));
            $con->commit();
        }catch (Exception $e){
            $con->rollback();
            throw $e;
        }
        
        //return to students page
        header('Location: students.php');
        exit;
    }
?>