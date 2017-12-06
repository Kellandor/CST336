<?php
    include 'database.php';
                
    $conn = getDatabaseConnection();
    $type = $_POST['type'];
    $sortby = $_POST['sortby'];
    $order = $_POST['order'];

    $sql = "SELECT * FROM device WHERE deviceType = '$type'
            ORDER BY $sortby $order";
    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    echo json_encode($records);
?>