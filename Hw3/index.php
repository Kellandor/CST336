<!DOCTYPE html>
<?php session_start() ?>
<html>
    <head>
        <style>@import url("css/styles.css");</style>
        <title> Generic Club Registration System (GCRS)</title>
    </head> 
    
    <body>
            <h1>Generic Club Registration</h1>
            <form  method="post">
                
            <div class="container">
                <div class="left">First Name: </div>
                <div class="right"><input class="textbox" type="text" name="firstname"><br></div>
            </div>
            
            <div class="container">
                <div class="left">Last Name: </div>
                <div class="right"><input class="textbox" type="text" name="lastname"><br></div>
            </div>

            <div class="clearall"></div>

            <div class="container">
            
                <div class="left">Current Year: </div>
                
                <div class="right">  
                
                    <select id="dropdown" name="year">
                    <option value="">Select...</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                    <option value="Forth">Forth</option>
                    </select>
                
                </div>
            </div>
            
            <div class="container">
                
                <div class="left">Gender: </div>
                
                <div class="right">
                    <input type="radio" name="gender" value="Male">M
                    <input type="radio" name="gender" value="Female">F
                </div>
                
            </div>

            <div class="container">
                <div class="left">Free day</div>
                
                <div class="right">
                    <input type="checkbox" name="schedule[]" value="Monday">Monday
                    <input type="checkbox" name="schedule[]" value="Tuesday">Tuesday
                    <input type="checkbox" name="schedule[]" value="Wednesday">Wednesday
                    <input type="checkbox" name="schedule[]" value="Thursday">Thursday
                    <input type="checkbox" name="schedule[]" value="Friday">Friday
                    
                </div>
                
            </div>
            
            <br><br>
            <div id="submit" >
                    <input type="submit" value="Submit">
            </div>

        </form>
        
        <?php
        
            $array = array('firstname', 'lastname', 'year', 'gender', 'schedule');
            $missing = false;
            
            foreach($array as $field)
            {
                if(empty($_POST[$field]))
                {
                    $missing = true;
                }
            }
            
            if(!$missing)
            {
                $_SESSION['firstname'] = $_POST["firstname"];
                $_SESSION['lastname'] = $_POST["lastname"];
                $_SESSION['year'] = $_POST["year"];
                $_SESSION['gender'] = $_POST["gender"];
                $_SESSION['schedule'] = "";
                $temp = ($_POST["schedule"]);
                foreach($temp as $temp=>$value)
                    $_SESSION['schedule'] .= $value." ";
                
                header("Location: https://cst336-kellandor.c9users.io/cst336-github/Hw3/check.php");
            }
        ?>
        
    </body>
        
    
</html>