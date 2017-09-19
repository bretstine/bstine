<!DOCTYPE html>
<html>
    <head>
        <title> Challenge 2 </title>
        <meta charset="utf-8" />
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <h1> Random Card Game </h1>
        </header>
        
        <main>
            
            <ul>
                <h3>
                <li>Human</li>
                <li>Computer</li>
                </h3>
            </ul>
            
            <?php
                
                include 'random.php';
                
                random();
                random();
                
            ?>
            
        </main>
    </body>
</html>