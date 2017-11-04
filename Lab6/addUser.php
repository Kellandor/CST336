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

    function departmentList()
    {
        global $conn;
        
        $sql = "SELECT * FROM departments ORDER BY name";
        $result = $conn ->query($sql);
        while($row = $result-> fetch_assoc())
        {
            echo "<option value=".$row['id'].">".$row['name']."</option>";
        }
    }

    if(isset($_POST['addaUser']))
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $phone = $_POST['phoneNum'];
        $department = $_POST['department'];
        
        $sql = "INSERT INTO user (firstName, lastName, email, phone, role, deptId)
                VALUES ('$firstName', '$lastName', '$email','$phone' , '$role', '$department')";
        $conn->query($sql);
        echo "user was added";
    }
?>    
<!DOCTYPE html>
<html>
    <head>
        <style>@import url("css/style.css");</style>
    </head>
    <body>
        <div class="main">
        <h1> Tech Checkout System: Adding a New User </h1>

        <form method="POST">
        User Id: <input type="text" name="userId" />
        <br />
        First Name:<input type="text" name="firstName" />
        <br />
        Last Name:<input type="text" name="lastName"/>
        <br/>
        Email: <input type= "email" name ="email"/>
        <br/>
        Phone Number: <input type ="text" name= "phoneNum"/>
        <br />
        Role: 
        <select name="role">
        <option value=""> - Select One - </option>
        <option value="staff">Staff</option>
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
        </select>
        <br />
        Department: 
        <select name="department">
        <option value="" > Select One </option>
        <?php 
            departmentList();
        ?>
        </select>
        <input type="submit" value="Add User" name="addaUser" class="button">
        </form>
        <form method="post" action="page.php">
            <input type="submit" value="Back" class="button"/>
        </form>
        </div>
    </body>
            
</html>