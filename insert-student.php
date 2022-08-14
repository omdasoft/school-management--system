<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $f_name = $education = $job = $work_location = $f_address = $mobile = "";
        $stud_name = $birth_date = $birth_place = $stud_address = $year = $religon = "";
        //get father data
        $f_name = test_input($_POST['f_name']);
        $education = test_input($_POST['education']);
        $job = test_input($_POST['job']);
        $work_location = test_input($_POST['work_location']);
        $f_address = test_input($_POST['f_address']);
        $mobile = test_input($_POST['mobile']);
        $date = date("Y-m-d");
        //get student data
        $stud_name = test_input($_POST['stud_name']);
        $birth_date = test_input($_POST['birth_date']);
        $birth_place = test_input($_POST['birth_place']);
        $stud_address = test_input($_POST['stud_address']);
        $year = test_input($_POST['year']);
        $religon = test_input($_POST['religon']);
        $class_id = test_input($_POST['class_id']);
        try{
            $con->beginTransaction();
            //insert father data with validation
            $sql = "INSERT INTO fathers (f_name,job,education,work_location,address,mobile,date) values (?,?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($f_name,$job,$education,$work_location,$f_address,$mobile,$date));
            //get father id 
            $f_id = $con->lastInsertId();
            //insert student data
            $sql = "INSERT into students (stud_name,birth_date,birth_place,address,religon,year,date,f_id,class_id) values (?,?,?,?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($stud_name,$birth_date,$birth_place,$stud_address,$religon,$year,$date,$f_id,$class_id));
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