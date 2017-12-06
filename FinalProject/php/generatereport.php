<?php

    include 'database.php';
                
    $conn = getDatabaseConnection();
    
    $data = array();

    $sql = "SELECT COUNT(id) total FROM user";
    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $data["total"] = $records[0]["total"];
    
    $sql = "SELECT COUNT(CASE WHEN role = 'Staff' then 1 ELSE NULL END) as 'STAFF', 
    COUNT(CASE WHEN role = 'Faculty' then 1 ELSE NULL END) as 'FACULTY', 
    COUNT(CASE WHEN role = 'Student' then 1 ELSE NULL END) as 'STUDENT' FROM `user`";
    
    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $data["staff"] = $records[0]["STAFF"];
    $data["faculty"] =  $records[0]["FACULTY"];
    $data["student"] =  $records[0]["STUDENT"];
    
    $sql = 'SELECT 
    COUNT(CASE WHEN deptId = "1" then 1 ELSE NULL END) as "Computer Science", 
    COUNT(CASE WHEN deptId = "2" then 1 ELSE NULL END) as "Statistics", 
    COUNT(CASE WHEN deptId = "3" then 1 ELSE NULL END) as "Design",
    COUNT(CASE WHEN deptId = "4" then 1 ELSE NULL END) as "Economics", 
    COUNT(CASE WHEN deptId = "5" then 1 ELSE NULL END) as "Drama", 
    COUNT(CASE WHEN deptId = "6" then 1 ELSE NULL END) as "Biology" 
    FROM user';
    
    $stmt = $conn ->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $data["Computer Science"] = $records[0]["Computer Science"];
    $data["Statistics"] =  $records[0]["Statistics"];
    $data["Design"] =  $records[0]["Design"];
    $data["Economics"] = $records[0]["Economics"];
    $data["Drama"] =  $records[0]["Drama"];
    $data["Biology"] =  $records[0]["Biology"];

    echo json_encode($data);

?>