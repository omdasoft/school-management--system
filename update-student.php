<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        var_dump($_POST);
        //get father data
        $f_no = $_POST['f_no'];
        $f_name = test_input($_POST['f_name']);
        $education = test_input($_POST['education']);
        $job = test_input($_POST['job']);
        $work_location = test_input($_POST['work_location']);
        $f_address = test_input($_POST['f_address']);
        $mobile = test_input($_POST['mobile']);
        $date = date("Y-m-d");
        //get student data
        $stud_no = $_POST['stud_no'];
        $stud_name = test_input($_POST['stud_name']);
        $birth_date = test_input($_POST['birth_date']);
        $birth_place = test_input($_POST['birth_place']);
        $stud_address = test_input($_POST['stud_address']);
        $year = test_input($_POST['year']);
        $religon = test_input($_POST['religon']);
        $class_id = test_input($_POST['class_id']);
        try{
            $con->beginTransaction();
            //update father data with validation
            $sql = "UPDATE fathers SET f_name = ?,job = ?,education = ?,work_location = ?,address = ?,mobile = ? WHERE f_no = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($f_name,$job,$education,$work_location,$f_address,$mobile,$f_no));
    
            //update student data
            $sql = "UPDATE students SET stud_name = ?,birth_date = ?,birth_place = ?,address = ?,religon = ?,year = ?,f_id = ?, class_id = ? WHERE stud_no = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($stud_name,$birth_date,$birth_place,$stud_address,$religon,$year,$f_no,$class_id,$stud_no));
            $con->commit();
        }catch (Exception $e){
            $con->rollback();
            throw $e;
        }
        
        //return to students page
        header('Location: students.php');
        exit;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>