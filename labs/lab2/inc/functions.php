<?php
        //$symbol = "cherry"; 
        
        function displaySymbol($randomNumber,$pos) {
        
            
             
            
           if ( $randomNumber == 0 ) {
             $symbol = "seven";
         } else if ( $randomNumber == 1) {
             $symbol = "cherry";
         } else if ( $randomNumber == 2) { 
              $symbol = "lemon";
         }
         
         else {
             $symbol = "orange";
         }  
        
         //endSwitch
        
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' >";
         }   
         //Find if the three symbols are the same
         
         function displayPoints($randomValue1,$randomValue2, $randomValue3) {
             
         
         if ($randomValue1 == $randomValue2  && $randomValue2 == $randomValue3) {
            switch ($randomValue1) {
                case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot!</h1>";
                        echo "<audio autoplay>
                        <source src='sounds/jackpot.mp3' type='audio/ogg'>
                        </audio>";
                        break;
                case 1: $totalPoints = 500;
                        break;
                case 2: $totalPoints = 250;
                        break;
                case 3: $totalPoints == 900;
                        break;
        }
            
            echo "<h2>You won $totalPoints points!</h2>";
        }         
        
        else {
            echo "<h3> Try Again! </h3>";
        }
        
            
        }
        function play() {     
            for ($i=1; $i<4; $i++){
             ${"randomValue" . $i } = rand(0,3);
             displaySymbol(${"randomValue" . $i}, $i );
             
        }
            
            
        }
        
        
 ?>

 
 
 