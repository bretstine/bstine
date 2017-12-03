<?php

    //print_r($_FILES);
    //echo "File size: " . $_FILES['myFile']['size'];
    
    if ($_FILES["myFile"]["size"] > 1000000 || $_FILES["myFile"]["size"] == 0) {
        echo "<h2>Selected files size is larger than 1MB!</h2>";
    } else {
        move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES['myFile']['name']);
    }

    $files = scandir("gallery/", 1);
    //print_r($files);
    
    for ($i = 0; $i < count($files) - 2; $i++) {
        echo "<img src='gallery/" . $files[$i] . "' id='" . $files[$i] . "'>";
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <style>
            body {
                text-align: center;
                background: radial-gradient(#262626, #444444, #999999);
                color: black;
            }
            
            img {
                border: solid;
                border-radius: 5px;
                border-width: 1px;
                width: 50px;
                height: auto;
            }
            
            #big img {
                border: solid;
                border-radius: 5px;
                border-width: 1px;
                width: auto;
            }
            
            img:hover {
                width: 60px;
                transition: .5s;
            }
        </style>
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script>
            document.querySelector('body').addEventListener('click', function(event) {
              if (event.target.tagName.toLowerCase() === 'img') {
                //alert(event.target.id);
                $('#big').html("<img src='" + event.target.src + "'>");
              }
            });
        </script>
    </head>
    <body>
        
        <h2> Photo Gallery </h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="myFile" />
            <input type="submit" value="Upload File!" />
        </form>
        
        <div id="big"></div>
    </body>
</html>