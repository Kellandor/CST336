<?php

    include 'database.php';
                
    $conn = getDatabaseConnection();
    
    $uId = $_GET['id'];

    $sql = "DELETE FROM user WHERE id='$uId'";


    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    

?>