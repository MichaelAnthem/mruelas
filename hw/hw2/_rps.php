<?php
   
   function display_items($item = null) {
    
    $items  = array(
  "rock"     =>  '<a href="?item=rock">Rock<br /><img src="images/rock.png" width="135" height="135" alt="Rock"></a>',
  "paper"    =>  '<a href="?item=paper">Paper<br /><img src="images/paper.png" width="135" height="135" alt="Paper"></a>',
  "scissors" =>  '<a href="?item=scissors">Scissors<br /><img src="images/scissors.png" width="135" height="135" alt="Scissors"></a>',
    ); 
    
    
    if($item == null):
        foreach ($items as $item => $value) :
         echo $value;
        endforeach;
    else:
       
       // echo $items[$item];
       
       echo str_replace("?item={$item}", "#", $items[$item]);
    endif;  
  
}

function game() {
    
    if(isset($_GET['item'])  == TRUE ) :
        
        //Valid Items
        $items = array('rock', 'paper', 'scissors');
        
        //User's Item
       $user_item = strtolower($_GET['item']);
       
       // COmputer's Item
        $comp_item = $items[rand(0,2)];
        
        // User's item isn't valid
        if(in_array($user_item, $items) == FALSE ) :
            echo "You must choose from either a Rock | Paper | Scissors.";
            die;
        endif;
        
        // Scissors > Paper
        // Paper > Rock
        // Rock > Scissors
        
        if( $user_item == 'scissors' && $comp_item == 'paper' ||
            $user_item == 'paper' && $comp_item == 'rock' ||
            $user_item == 'rock' && $comp_item == 'scissors' ) :
                echo '<h2>You Win!</h2>';
        endif;
        
        if( $comp_item == 'scissors' && $user_item == 'paper' ||
            $comp_item == 'paper' && $user_item == 'rock' ||
            $comp_item == 'rock' && $user_item == 'scissors' ) :
                echo '<h2>You Lose!</h2>';
        
        endif;
        
        if( $user_item == $comp_item) :
            echo '<h2>Tie!</h2>';
        endif;
        
        // User's Item
        display_items($user_item);
        
        // Computer's Item
        display_items($comp_item);
        
        // Add a go back link
            echo '<form><input type="submit" value="Play again" /></form>'; // <a href="./">Play Again!</a></div>';
        
    else :
        
        display_items();
        
    endif;
}

?>
