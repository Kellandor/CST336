<!DOCTYPE html>

<html>
    <head>
        <style>@import url("css/styles.css");</style>
        <title> Dice Roller </title>
    </head> 
    <body>
        <div id="main">
            <h1>DND Dice Roller
            <p id="headertext">Enter the size of the dice you wish to roll and pray to RNGESUS</p>
            </h1>
            <hr width="80%"/>
            
            <nav>
            <ul class="navigation">
                <li class="navigation-items"><a class="currenttab" href="index.php">Custom</a></li>
				<li class="navigation-items"><a href="premade.php">Preloaded</a></li>
            </ul>
        </nav>
            
            <?php
                $dicesize = array();
                if(isset($_POST['dicesize']))
                {
                    array_push($dicesize, $_POST['dicesize']);
                    echo '<div id="textfield">';
                    if(is_numeric($dicesize[0]))
                    {   
                        $n = rand(1,array_pop($dicesize));
                    }
                    else {
                        echo "Invalid input!";
                    }
                    
                    if($_POST['dicesize'] == 20)
                    {
                    switch($n)
                    {
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                            echo "You rolled ".$n."! You're so fucked.";
                            break;
                        case 6:
                        case 7:
                        case 8:
                        case 9:
                        case 10:
                            echo "You rolled ".$n."! You're still fucked.";
                            break;
                        case 11:
                        case 12:
                        case 13:
                        case 14:
                        case 15:
                            echo "You rolled ".$n."! Decent roll!";
                            break;
                        case 16:
                        case 17:
                        case 18:
                        case 19:
                        case 20:
                            echo "You rolled ".$n."! Nice Roll!";
                            break;
                    }
                    }
                    else 
                        echo $n;
                    echo '</div>';
                }
            ?>
            
            <form method="POST">
                <p id="formtext">Enter dice number:</p>
                <input type="text" name="dicesize" /><br/><br/>
                <input type="submit" name="button" value="Roll!"/>
            </form>
    
        </div>
        </body>
        
        
        <footer>
            <hr width="60%"/>
            This page was created for entertainment/educational purposes. 
        </footer>
</html>