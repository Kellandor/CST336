<?php

    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b6a511dac68435";
    $password = "81b74e3e";
    $dbname = "heroku_a1a7ef0ac942311";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn -> connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $target = $_GET['username'];
    
    $sql = "SELECT * FROM user WHERE username ='$target'";
    
    $result = $conn ->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);

    // while($row = $result->fetch_assoc())
    //     {
    //         echo json_encode($row)."<br>";
    //     }
                

?>