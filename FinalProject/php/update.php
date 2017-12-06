<?php
    include 'database.php';
                
    $conn = getDatabaseConnection();
    
    $uId = $_POST['id'];
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    

    $sql = "UPDATE user
            SET firstName='$fName', lastName='$lName', email='$email', phone='$phone', role='$role', deptId='$department' 
            WHERE id=".$uId;

    echo $sql;
    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    
?>