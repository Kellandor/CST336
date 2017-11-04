
<!DOCTYPE html>
<html>
    <head>
        <style>@import url("css/style.css");</style>
    </head>
    <body>
        <div class="main">
        <form method="post">
            <input type="submit" name="back" value="back" class="button"/>
            <input type="submit" name="delete" value="delete" class="button"/>
        </form>
        
        <?php
        $userInfo;
        $servername = "us-cdbr-iron-east-05.cleardb.net";
        $username = "b6a511dac68435";
        $password = "81b74e3e";
        $dbname = "heroku_a1a7ef0ac942311";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if($conn -> connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
    
        
        
        function getUserInfo()
        {
            global $conn;
            
            $userId = $_GET['userId'];
            
            $sql = "SELECT * FROM user WHERE id = '$userId'";
            $result = $conn ->query($sql);
    
            $row = $result->fetch_assoc();
            return $row;
        }
        
        if(isset($_POST['back']))
        {
            header("Location: page.php");
        }
        
        if(isset($_POST['delete']))
        {
            $userInfo = getUserInfo();
            
            $sql = "DELETE FROM user
                    WHERE id=".$userInfo['id'];
            $conn ->query($sql);
            echo "User deleted";
        }
        else
            echo "Are you sure you want to delete this user?";
    ?>
        
        </div>
    </body>
</html>