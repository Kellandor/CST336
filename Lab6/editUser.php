

<!DOCTYPE html>
<html>
        <head>
        <style>@import url("css/style.css");</style>
    </head>
    <body>
        <div class="main">
        <h1>Update User</h1>
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
    
    function departmentList()
    {
        global $conn;
        $userInfo = getUserInfo();
        
        $deptId = $userInfo['deptId'];
        
        $sql = "SELECT * FROM departments ORDER BY name";
        $result = $conn ->query($sql);
        while($row = $result-> fetch_assoc())
        {
           // echo "<option value=\"$row[\"id\"]\"" . ($deptId == $row['id'] ? "selected" : "") . ">$row[\"name\"]</option>";
           
           echo '<option value="'.$row['id'].'"' .($deptId == $row['id'] ? "selected" : "") .' > '.$row["name"].' </option>';
        }
        // $row = $result->fetch_assoc();
        // return row;

    }

    if(isset($_GET['userId']))
    {
        $userInfo = getUserInfo();
        
        if(isset($_POST['updateUser']))
        {
            $fName = $_POST['firstName'];
            $lName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $dept = $_POST['deptId'];
            $sql = "UPDATE user
                    SET firstName='$fName', lastName='$lName', email='$email', phone='$phone', role='$role', deptId='$dept' 
                    WHERE id=".$userInfo['id'];
                    
            $conn ->query($sql);
            
            echo "Updated user";
            $userInfo = getUserInfo();
        }
        
    }
?>

<form method="POST">
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>"/>
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>"/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff" <?=($userInfo['role']=='Staff' || $userInfo['role']=='staff')?" selected":""?>>staff</option>
                <option value="student" <?=($userInfo['role']=='Student' || $userInfo['role']=='student')?" selected":""?>>student</option>
                <option value="faculty" <?=($userInfo['role']=='Faculty'|| $userInfo['role']=='faculty')?" selected":""?>>faculty</option>
            </select>
            <br />
            Department: 
            <select name="deptId">
                <option value="" > Select One </option>
                <?php
                    //$department = departmentList();
                    departmentList();
                ?>
            </select>
            <input type="submit" value="Update User" name="updateUser" class="button">
        </form>
        <form method="post" action="page.php">
            <input type="submit" value="Back" class="button"/>
        </form>
</div>
    </body>
    

</html>