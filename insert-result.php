<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $subjects = $_POST['subject'];
        $class_id = $_POST['class_id'];
        $stud_no = $_POST['stud_no'];       
        $subject_ids = implode(',', array_column($subjects, 'id'));
        $qry = "SELECT * FROM student_result WHERE subject_id IN ($subject_ids) AND class_id = ? AND student_no = ?";
        $stmt = $con->prepare($qry);
        //$qq = $stmt->debugDumpParams();
        $stmt->execute(array($class_id, $stud_no));
        $count = $stmt->rowCount();
        if($count > 0){
            $message = "results already added for this student";
            header('location: students.php?message='.$message);
        }else{
            $sql = "INSERT into student_result(class_id, subject_id, student_no, mark) values (?,?,?,?)";
            $stmt = $con->prepare($sql);
           
            foreach($subjects as $subject) {
                $stmt->execute(array($class_id, $subject['id'], $stud_no, $subject['mark']));
            }
        
            header('location:show-results.php?stud_no='.$stud_no);
            exit;
        }

       
    }
?>