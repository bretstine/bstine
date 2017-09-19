<?php

    function displaySymbol($symbol)
    {
        echo "<img src='../lab/lab2/img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) ."' width='70' />";
    }

    $symbols = array("lemon", "orange", "cherry");
    
    // print_r($symbols); // displays array contents, only for debugging purposes
    // echo $symbols[0]; // displays first element in the array
    
    // displaySymbol($symbols[2]);
    
    $symbols[] = "grapes"; // adds an element at the end of the array
    array_push($symbols, "seven"); // adds an element at the end of the array
    
    for ($i=0; $i < count($symbols); $i++)
    {
        displaySymbol($symbols[$i]);
    }
    
    sort($symbols); // sorts in assending order, rsort sorts in reverse order
    print_r($symbols);
    shuffle($symbols);
    echo "<hr>";
    
    // $lastSymbol = array_pop($symbols); // retrieves and REMOVES the last element of the array
    
    foreach ($symbols as $symbol)
    {
        displaySymbol($symbol);
    }
    echo "<hr>";
    
    // unset($symbols[2]); // removes element in the array but keeps its position
    // $symbols = array_values($symbols); // re-indexes the array, 0 - 1  - 3 becomes 0 - 1 - 2
    
    
    // Display a random symbol
    displaySymbol($symbols[rand(0, count($symbols) - 1)]);
    echo "<hr>";
    displaySymbol($symbols[array_rand($symbols)]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
        <meta charset="utf-8" />
    </head>
    <body>

    </body>
</html>