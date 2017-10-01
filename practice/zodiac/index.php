<?php

    function randomlist($startYear, $endYear)
    {
        $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

        $yearSum = 0;
        $count = 0;
        
        for ($i=$startYear;$i<=$endYear;$i++)
        {
            if ($i % 100 == 0 && $i != 1900)
                echo "Year: $i Happy New Century!";
            else if ($i == 1776)
                echo "Year: $i USA INDEPENDENCE!";
            else if ($i >= 1900)
            {
                echo "Year: $i";
                echo "<br />";
                echo "<img src='./img/$zodiac[$count].png'>";
                echo "<hr />";
                $count++;
            }
            else
                echo "Year: " . $i;
            echo "<br />";
            
            if ($count > 11)
                $count = 0;
            
            $yearSum = $yearSum + $i;
        }
        
        return $yearSum;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Zodiac </title>
    </head>
    
    <header><h1>Chinese Zodiac List</h1></header>
    <body>
        
        <?php
            echo "Sum total: " . randomlist(1500, 2000);
        ?>
        
    </body>
</html>