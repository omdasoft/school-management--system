<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        $name = $education = $email = $phone = $address = $join_date =  "";
        //get father data
        $name = test_input($_POST['name']);
        $education = test_input($_POST['education']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $address = test_input($_POST['address']);
        $join_date = date("Y-m-d");
        $sql = "INSERT INTO teachers (name,address,phone,email,join_date,education) values (?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($name, $address, $phone, $email, $join_date, $education));
    
        //return to teachers page
        header('Location: teachers.php');
        exit;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>