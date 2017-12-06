<?php

function getDatabaseConnection()
{
    
        $servername = "us-cdbr-iron-east-05.cleardb.net";
        $username = "b6a511dac68435";
        $password = "81b74e3e";
        $dbname = "heroku_a1a7ef0ac942311";

// Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $conn;
    
  }

?>