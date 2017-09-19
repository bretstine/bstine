<?php
    
    function getRandomColour()
    {
        return "rgba( ".rand(0,255).", ".rand(0,255).", ".rand(0,255).", ".(mt_rand(0,10)/10).");";
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Background Colour </title>
        <meta charset="utf-8" />
        
        <style>
            body {
               /* background-color: rgba(15,20,200,.5);  rgba: Red Green Blue Alpha */
                <?php
                echo "background-color: " . getRandomColour();
                ?>
            }
            
            h1 {
               /* background-color: rgba(15,20,200,.5);  rgba: Red Green Blue Alpha */
                <?php
                echo "color: " . getRandomColour();
                echo "background-color: " . getRandomColour();
                ?>
            }
            
            h2 {
                background-color: <?=getRandomColour()?>
                color: <?=getRandomColour()?>
            }
        </style>
        
    </head>
    <body>
        
        <h1> Welcome! </h1>
        
        <h2> Hola! </h2>
        
    </body>
</html>