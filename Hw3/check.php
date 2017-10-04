<!DOCTYPE html>
<?php session_start() ?>
<html>
    <head>
        <style>@import url("css/styles.css");</style>
        <title> Stupid Club Registration System (SCRS)</title>
    </head> 
    
    <body>
        <h2>Welcome, <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']?>!</h2>
        <div id="maintext">
        <?php
            echo "You are now a member of some generic club! You're the one and only ".$_SESSION['year']." year student in the club.<br>";
            echo "Well, given your availability on ".$_SESSION['schedule'].", let's hope you could make it to the club's meeting on no-date.<br>";
            echo "The reason being you're the only member so if a club meets in the middle of the forest and nobody is around to attend, does the club still meet?<br>";
            echo "Anyway, hope you're enjoying this wonderful demonstration of the generic club registration system.<br>";
            echo "Here's a picture of a panda for your time: <br>";
            echo "<img src='https://i.pinimg.com/736x/c2/33/18/c23318c87c13c8e4d4d7351bf51dcee9--baby-panda-bears-baby-pandas.jpg'";
        ?>
        </div>
    </body>
        
</html>