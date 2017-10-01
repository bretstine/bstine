<?php

    $backgroundImage = "img/sea.jpg";
    
    if (isset($_GET['keyword']))
    {
        // echo "Keyword typed: " . $_GET['keyword'];
        
        include 'api/pixabayAPI.php';
        
        $keyword = $_GET['keyword'];
        
        if (!empty($_GET['category']))
        {
            $keyword = $_GET['category'];
        }
        if (isset($_GET['layout']))
        {
            $imageURLs = getImageURLs($keyword, $_GET['layout']);
        } else {
            $imageURLs = getImageURLs($keyword);
        }
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    function checkIfSelected($option)
    {
        if ($option == $_GET['category'])
        {
            return "selected";
        }
    }
    
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <br /><br />
        
        
        <form>
            <div class="key_sub">
                <input type="text" name="keyword" placeholder="Keyword" value"<?=$_GET['keyword']?>"/>
                <input type="submit" value="Submit"/>
            </div>
            
            <div class="layoutSel">
                <input type="radio" id="lhorizontal" name="layout" value="horizontal" <?= ($_GET['layout']=='horizontal')?"checked":"" ?> >
                <label for="lhorizontal"> Horizontal </label>
                
                <br />
                
                <input type="radio" id="lvertical" name="layout" value="vertical" 
                <?php
                    if ($_GET['layout']=="vertical")
                    {
                        echo "checked";
                    }
                
                ?>
                >
                
                <label for="lhorizontal"> Vertical </label>
            </div>
            
            <select name="category">
                <option value="">- Select One -</option>
                <option <?=checkIfSelected('Sea')?> >Sea</option>
                <option <?=checkIfSelected('Forest')?> >Forest</option>
                <option <?=checkIfSelected('Mountain')?> >Mountain</option>
                <option <?=checkIfSelected('Sky')?> >Sky</option>
                <option <?=checkIfSelected('Universe')?> >Universe</option>
            </select>
            
        </form>
        
        <br /><br />
        <?php
            if (!isset($imageURLs))
            {
                echo "<h2> Type a keyword to display a slideshow with random images from Pixabay.com </h2>";
            } else {
                if (empty($_GET['keyword']) && empty($_GET['category']))
                {
                    echo "<h2> Error! You must enter a keyword or category </h2>";
                    return;
                    exit;
                }
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
            <?php
                for ($i=0;$i<7;$i++)
                {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)?" class='active'": "";
                    echo "></li>";
                }
            ?>
            </ol>
    
            <!-- Wrapper for Images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i=0;$i<7;$i++)
                    {
                        do {
                            $randomeIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomeIndex]));
                    
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomeIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomeIndex]);
                    }
                ?>
            </div>
            <!-- Controls Here -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        
        </div>

        <?php
            }
        ?>
        <br />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>