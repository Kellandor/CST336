<?php 
    session_start();

    if(!isset($_SESSION['userName']))
    {
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <style>@import url("css/style.css");</style>
    </head>
    <body>
        <div class="main">
        <h1>Admin Main</h1>
        <h2>Welcome <?php echo $_SESSION['adminName'] ?></h2>
        
        
        
        <form method="post" action="addUser.php">
            <input type="submit" value="Add New User" class="button"/>
        </form>
        <form method="post" action="logOut.php">
            <input type="submit" value="Logout" class="button" />
        </form>
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
            
            $sql = "SELECT * FROM user ORDER BY lastName ASC";
            $result = $conn ->query($sql);
            if($result -> num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo $row['id']." ".$row['firstName']." ".$row['lastName'];
                    echo " [ <a href='editUser.php?userId=".$row['id']."'>Update</a>] [ <a href='deleteUser.php?userId=".$row['id']."'>Delete</a>]<br>";
                }
            }
        ?>

        </div>
    </body>
</html>