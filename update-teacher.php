<?php
    //error_reporting(0);
    include('includes/db.php');
    if(isset($_POST['submit'])) {
        //get father data
        $id = $_POST['id'];
        $name = test_input($_POST['name']);
        $education = test_input($_POST['education']);
        $email = test_input($_POST['email']);
        $address = test_input($_POST['address']);
        $phone = test_input($_POST['phone']);
        $join_date = test_input($_POST['join_date']);
        $education = test_input($_POST['education']);
        $sql = "UPDATE teachers SET name = ?,address = ?,phone = ?,email = ?,join_date = ?, education = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($name, $address, $phone, $email, $join_date, $education, $id));

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