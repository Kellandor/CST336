<?php
        function play(){
        for($i=1; $i<4; $i++){
            ${"random" . $i} = rand(0,3);
            displaySymbol(${"random" . $i}, $i);
        }
        displayPoints($random1,$random2,$random3);
        }
        
        function displaySymbol($random, $pos){
            switch($random){
                case 0 : $symbol = "seven";
                        break;
                        
                case 1: $symbol = "cherry";
                        break;
                        
                case 2: $symbol = "lemon";
                        break;
                
                case 3: $symbol = "grapes";
                        break;
            }
            
            echo "<img id='reel$pos' src='./img/$symbol.png' alt='$symbol' title=' ". ucfirst($symbol) ." ' width='70'></img>";
        }
        
        function displayPoints($random1,$random2,$random3){
            
            echo "<div id='output'>";
            if($random1 == $random2 && $random2 == $random3)
            {
                switch($random1){
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            playSounds();
                            break;
                            
                    case 1: $totalPoints = 500;
                            break;
                            
                    case 2: $totalPoints = 250;
                            break;
                            
                    case 3: $totalPoints = 900;
                            break;
                }
                
                echo "<h2>You won $totalPoints points!</h2>";
            }
            else{
                echo "<h3>Try Again!</h3>";
            }
            echo "</div>";
        }
        
        function playSounds(){
            echo "<audio autoplay>";
            echo "<source src='./img/GT.mp3' type='audio/mpeg'>";
            echo "</audio>";
        }
?>