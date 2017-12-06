<?php
    include 'database.php';
                
    $conn = getDatabaseConnection();

    $sql = "SELECT * FROM user";

    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    echo json_encode($records);
?>