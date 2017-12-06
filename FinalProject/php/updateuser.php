<?php
    include 'database.php';
                
    $conn = getDatabaseConnection();

    $uId = $_GET['id'];
    
    $sql = "SELECT * FROM user WHERE id= '$uId'";

    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    echo json_encode($records);
    
?>