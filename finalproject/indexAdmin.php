<?php
    session_start();

    include 'functions/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Home </title>
        
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script>
            function confirmDelete(gameName) {
                return confirm("Are you sure you want to delete game " + gameName + "?");
            }
        </script>
    </head>
    <body>
        
        <header> Admin Page </header>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand active" href="indexAdmin.php">Home <span class="sr-only">(current)</span></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link menu" href="insertIndex.php">Insert</a>
                  <form class="navbar-form">
                      <button type="submit" class="btn btn-link menu" name="average">Average Price</button>
                      <button type="submit" class="btn btn-link menu" name="sum">Sum of Price</button>
                      <button type="submit" class="btn btn-link menu" name="count">Count Developers</button>
                  </form>
                </div>
              </div>
              <div class="navbar-nav navbar-right">
                <a class="btn btn-default" href="index.php" role="button">Logout</a>
              </div>
              <form class="navbar-form navbar-right">
                  <div class="input-group my-group">
                      <input type="text" name="gameSearch" class="form-control" placeholder="Search for Game">
                      <span class="input-group-btn">
                          <button type="submit" name="submit" class="btn btn-default my-group-button">Search</button>
                      </span>
                  </div>
              </form>
            </div>
        </nav>
        
        <?php 
            
            
        if (isset($_GET['average'])) {
            $average = avgDisplay();
            echo "Average price: " . $average['average'];
        }
        
        if (isset($_GET['sum'])) {
            $sum = sumDisplay();
            echo "Total sum: " . $sum['sum'];
        }
        
        if (isset($_GET['count'])) {
            $count = countDisplay(); 
            echo "Total distinct Developers: " . $count['count'];
        }
        ?>
        
        <div class="container">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Game Title</th>
                <th>Developer</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Release Date</th>
                <th>ESRB</th>
                <th>Metacritic Score</th>
                <th>Average Price</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
              <?=displayGamesV2()?>
            </tbody>
          </table>
        </div>
        
    </body>
</html>