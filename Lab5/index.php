<!DOCTYPE html>
<html>
    <head>
        <style>@import url("css/styles.css");</style>
        <title>Tech Checkout</title>
    </head> 
    
    <body>
        
        <div>
        <form class="container" method="post">
                <div class="inner">  
                    <select id="dropdown" name="deviceType">
                    <option value="">Select...</option>
                    <option value="computer">Computer</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Paper Weight">Paper Weight</option>
                    <option value="Handheld">Handheld</option>
                    <option value="Fitness Tracker">Fitness Tracker</option>
                    <option value="Console">Console</option>
                    <option value="Drink">Drink</option></option>
                    </select>
                
                </div>
                
                <div class="inner">Sort:
                    <input type="radio" name="name" value="deviceName">Device Name
                    <input type="radio" name="price" value="Price">Price
                </div>

                <div class="inner">
                        <input type="submit" value="Submit">
                </div>
            <br><br>
        </form>
        </div>
        <div class="innerbody">
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
            
            if(empty($_POST))
            {
                $sql = "SELECT deviceName, deviceType, price, status FROM device ORDER BY deviceName";
            }
            else {
                if(!empty($_POST["deviceType"]))
                {
                    if(isset($_POST["name"]) && !isset($_POST["price"]))
                    {
                        $sql = 'SELECT deviceName, deviceType, price, status FROM device WHERE deviceType="' . $_POST["deviceType"] . '" ORDER BY ' .$_POST["name"] .';';
                    }
                    else if(isset($_POST["price"]) && !isset($_POST["name"]))
                    {
                        $sql = 'SELECT deviceName, deviceType, price, status FROM device WHERE deviceType="' . $_POST["deviceType"] . '" ORDER BY ' .$_POST["price"] .';';
                    }
                    else
                        $sql = 'SELECT deviceName, deviceType, price, status FROM device WHERE deviceType="' . $_POST["deviceType"] . '";';
                }
                else
                {
                    if(isset($_POST["name"]) && !isset($_POST["price"]))
                    {
                        $sql = "SELECT deviceName, deviceType, price, status FROM device ORDER BY " . $_POST["name"];
                    }
                    else if(isset($_POST["price"]) && !isset($_POST["name"]))
                    {
                        $sql = "SELECT deviceName, deviceType, price, status FROM device ORDER BY " . $_POST["price"];
                    }
                }
            }
            
            $result = $conn ->query($sql);
            
            if($result -> num_rows > 0)
            {
                echo "<table class='innerbody'>";
                echo "<tr>";
                echo "<th>deviceName</th>";
                echo "<th>deviceType</th>";
                echo "<th>price</th>";
                echo "<th>status</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<td width='200'>". $row["deviceName"] ."</td>";
                        echo "<td width='200'>". $row["deviceType"] ."</td>";
                        echo "<td width='200'>". $row["price"] ."</td>";
                        echo "<td width='200'>". $row["status"] . "</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            }
            else 
            {
                echo "0 results";
            }
        ?>
        </div>
    </body>
</html>