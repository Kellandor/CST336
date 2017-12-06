<?php
    include 'database.php';
                
    $conn = getDatabaseConnection();

    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    
    $sql = "INSERT INTO user (firstName, lastName, email, phone, role, deptId)
            VALUES ('$fName', '$lName', '$email','$phone' , '$role', '$department')";

    //echo $sql;

    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    
?>