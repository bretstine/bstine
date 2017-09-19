<?php
    
    function filetypePIC($pictureIMG, $index)
    {
        if ($pictureIMG[$index] == darkfantasy_2314x1080 || $pictureIMG[$index] == yourname_1920x1200)
        {
            $filetype = png;
        }
        else if ($pictureIMG[$index] == moon_3458x2594 || $pictureIMG[$index] == nebula_2560x1440
                || $pictureIMG[$index] == skypaper_6480x4320 || $pictureIMG[$index] == treewater_4069x2340)
        {
            $filetype = jpeg;     
        }
        else
        {
            $filetype = jpg;
        }
        
        return $filetype;
    }
    
    function randPicture(&$pictureIMG)
    {
        $index = rand(0, count($pictureIMG) - 1);
        
        $filetype = filetypePIC($pictureIMG, $index);
        
        echo "<a href='img_BG/$pictureIMG[$index].$filetype' target='_blank'>";
        echo "<img class='resizeBG' src='img_BG/$pictureIMG[$index].$filetype' title='$pictureIMG[$index]' alt='$pictureIMG[$index]'>";
        echo "</a>";
        echo "<br />";
        
        unset($pictureIMG[$index]);
        $pictureIMG = array_values($pictureIMG);
    }
    
    function showonlyone()
    {
        $pictureIMG = array("abstract_3931x2621", "airballoon_1920x1307", "colourcity_1920x1200",
                            "darkfantasy_2314x1080", "futurescifi_1920x1350", "gotdragon_3840x2180",
                            "moon_3458x2594", "nebula_2560x1440", "planet_1920x1200", 
                            "skypaper_6480x4320", "treewater_4069x2340", "yourname_1920x1200");
        
        $index = rand(0, count($pictureIMG) - 1);
        
        $filetype = filetypePIC($pictureIMG, $index);
        
        echo "<a href='img_BG/$pictureIMG[$index].$filetype' target='_blank'>";
        echo "<img class='resizeBG' src='img_BG/$pictureIMG[$index].$filetype' title='$pictureIMG[$index]' alt='$pictureIMG[$index]'>";
        echo "</a>";
    }
    
    
    function showthree()
    {
        $pictureIMG = array("abstract_3931x2621", "airballoon_1920x1307", "colourcity_1920x1200",
                            "darkfantasy_2314x1080", "futurescifi_1920x1350", "gotdragon_3840x2180",
                            "moon_3458x2594", "nebula_2560x1440", "planet_1920x1200", 
                            "skypaper_6480x4320", "treewater_4069x2340", "yourname_1920x1200");
        
        for($i=0;i<count($pictureIMG) - 10;$i++)
        {
            randPicture($pictureIMG);
        }
    }

    function showallpictures()
    {
        $pictureIMG = array("abstract_3931x2621", "airballoon_1920x1307", "colourcity_1920x1200",
                            "darkfantasy_2314x1080", "futurescifi_1920x1350", "gotdragon_3840x2180",
                            "moon_3458x2594", "nebula_2560x1440", "planet_1920x1200", 
                            "skypaper_6480x4320", "treewater_4069x2340", "yourname_1920x1200");
        
        for($i=0;i<count($pictureIMG);$i++)
        {
            randPicture($pictureIMG);
        }
    }
    
?>