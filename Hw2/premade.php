<!DOCTYPE html>

<html>
    <head>
        <style>@import url("css/styles.css");</style>
        <title> Dice Roller </title>
    </head> 
    <body>
        <div id="main">
            <h1>DND Dice Roller
            <p id="headertext">Pick and Roll</p>
            </h1>
            <hr width="80%"/>
            
            <nav>
            <ul class="navigation">
                <li class="navigation-items"><a href="index.php">Custom</a></li>
				<li class="navigation-items"><a class="currenttab" href="premade.php">Preloaded</a></li>
            </ul>
        </nav>
            <?php
                $diceArr = array("4", "6", "8", "10", "20");
                
                echo '<div id="tablecontent">';
                echo '<form method="POST">';
                
                echo '<tr id="table-header">';
                echo '<td><strong>Dice Size</strong></td>';
                echo '<td><strong>Roll!</strong></td>';
                echo '</tr>';
                for($i = 0; $i < count($diceArr); $i++)
                {
                    $temp = $diceArr[$i];
                    echo '<table>';
                    echo '<tr>';
                    echo '<td>'.$diceArr[$i].'</td>';
                    echo '<td><input type="submit" value="Roll!" name='.$temp.' /></td>';
                    echo '</tr>';
                    echo '</table>';
                }
                echo '</form>';
                
                for($i = 0; $i < count($diceArr); $i++)
                {
                    if(isset($_POST[$diceArr[$i]]))
                        echo '<div id="output">'.rand(1,$diceArr[$i]).'</div>';
                }
                echo '</div>';
            ?>
            
        </div>
        </body>
        
        
        <footer>
            <hr width="60%"/>
            This page was created for entertainment/educational purposes. 
        </footer>
</html>