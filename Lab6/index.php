<?php
    session_start();
    
    if(isset($_POST['login']))
    {
        $user = $_POST['username'];
        $pw = sha1($_POST['password']);
        
        $servername = "us-cdbr-iron-east-05.cleardb.net";
        $username = "b6a511dac68435";
        $password = "81b74e3e";
        $dbname = "heroku_a1a7ef0ac942311";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if($conn -> connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // $nameParam = array();
        // $nameParam[':users'] = $user;
        // $nameParam[':pword'] = $pw;
        
        // $sql = "SELECT * FROM admin WHERE username = :users AND password = :pword";
        $sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$pw';";
        
        $result = $conn ->query($sql);
        if($result -> num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "Welcome back, ".$row['firstName']."<br>";
                
                $_SESSION['userName'] = $row['firstName'];
                $_SESSION['adminName'] = $row['firstName']. " ".$row['lastName'];
                $_SESSION['conn'] = $conn;
            }

            header("Location: page.php");
            exit();
        }
        else {
            echo "Invalid login";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <style>@import url("css/style.css");</style>
    <body>
        <h1>Admin Login</h1>
        <form method='post'>
            Username: <input type="text" name="username"/><br>
            Password: <input type="password" name="password"/><br>
            <input type="submit" name="login" value="Submit" class="button"/>
        </form>
    </body>
</html>