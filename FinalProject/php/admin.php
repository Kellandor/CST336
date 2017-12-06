<?php
        $user = $_POST['username'];
        $pw = sha1($_POST['password']);
        
        // $servername = "us-cdbr-iron-east-05.cleardb.net";
        // $username = "b6a511dac68435";
        // $password = "81b74e3e";
        // $dbname = "heroku_a1a7ef0ac942311";
        
        //$conn = new mysqli($servername, $username, $password, $dbname);
        
        include 'database.php';
                    
        $conn = getDatabaseConnection();

        $sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$pw';";
        
        $stmt = $conn ->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetch();
        
        //print_r($records);
        
        if($records)
        {
            echo "Login successfully";
        }
        else {
            echo "Invalid login";
        }
?>