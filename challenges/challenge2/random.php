<?php
    
    function random()
    {
        
        $randomFolder = rand(0,3);
        switch ($randomFolder)
            {
                case 0: $folder = "clubs";
                        break;
                case 1: $folder = "diamonds";
                        break;
                case 2: $folder = "hearts";
                        break;
                case 3: $folder = "spades";
                        break;
            }
            
        $randomCard = rand(0,4);
        switch ($randomCard)
           {
                case 0: $card = "ace";
                        break;
                case 1: $card = "jack";
                        break;
                case 2: $card = "king";
                        break;
                case 3: $card = "queen";
                        break;
                case 4: $card = "ten";
                        break;
            }
            
        echo "<img src='img/cards/$folder/$card.png' alt='$card' title='". ucfirst($card)."'  >";
    }
    
?>