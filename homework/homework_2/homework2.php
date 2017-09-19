<?php

    include 'functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8" />
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header><span class="fa fa-picture-o fa-4x" aria-hidden="true"></span><span class="fonts"> 12 Background Images</span></header>
        
        <form method="post" id="block">
            <input type="submit" name="show1" class="button" value="Show 1" />
            <input type="submit" name="show3" class="button" value="Show 3" />
            <input type="submit" name="showall" class="button" value="Show all" />
        </form>
        
        <?php
           
            if (array_key_exists('show3',$_POST))
            {
                showthree();
            }
            if (array_key_exists('showall',$_POST))
            {
                showallpictures();
            }
            else 
            {
                showonlyone();
            }
            
        ?>
        
        <hr class="hrColour"/>
        <footer>
            <img id="imgResize" src="img/csumb.jpg" alt="theses"/>
            <div class="foot">
            CST336. 2017&copy; Stine <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
            It is used for academic purposes only.
            </div>
        </footer>
    </body>
</html>