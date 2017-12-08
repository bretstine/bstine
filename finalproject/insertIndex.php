<?php
    session_start();

    include 'functions/functions.php';
    
    if (isset($_GET['addGame'])) {
        $_SESSION['gameId'] = $_GET['gameId'];
        $sql = "INSERT INTO `fp_games`
                VALUES ('', :gameName, :gameGenre, :gameDescription, :gameRelease, :gameRating, :gameScore, :gamePrice)";
        
        $namedParameters = array();
        $namedParameters[':gameName'] = $_GET['gameName'];
        $namedParameters[':gameGenre'] = $_GET['gameGenre'];
        $namedParameters[':gameDescription'] = $_GET['gameDescription'];
        $namedParameters[':gameRelease'] = $_GET['gameRelease'];
        $namedParameters[':gameRating'] = $_GET['gameRating'];
        $namedParameters[':gameScore'] = $_GET['gameScore'];
        $namedParameters[':gamePrice'] = $_GET['gamePrice'];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        //$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
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
    </head>
    <body>
        
        <header> Admin Page </header>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="indexAdmin.php">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
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
        </nav>
        
        <div class="container">
          <h1>Adding Game</h1>
    				<form>
  						<div class="row">
  							<div class="col-sm-6 form-group">
  								<label>Game Title</label>
  								<input type="text" name="gameName" placeholder="" class="form-control">
  							</div>
  							<div class="col-sm-6 form-group">
  								<label>Genre</label>
  								<input type="text" name="gameGenre" placeholder="" class="form-control">
  							</div>
  						</div>					
  						<div class="form-group">
  							<label>Description</label>
  							<textarea rows="7" name="gameDescription" placeholder="" class="form-control"></textarea>
  						</div>	
  						<div class="row">
  							<div class="col-sm-4 form-group">
  								<label>Release Date</label>
  								<input type="text" name="gameRelease" placeholder="" class="form-control">
  							</div>	
  							<div class="col-sm-4 form-group">
  								<label>ESRB</label>
  								<input type="text" name="gameRating" placeholder="" class="form-control">
  							</div>	
  							<div class="col-sm-4 form-group">
  								<label>Metacritic</label>
  								<input type="text" name="gameScore" placeholder="" class="form-control">
  							</div>		
  						</div>
							<div class="form-group">
								<label>Price</label>
								<input type="text" name="gamePrice" placeholder="" class="form-control">
							</div>					
    					<input type="submit" name="addGame" class="btn btn-lg btn-info" value="Submit"/>	
    				</form> 
        </div>
        
    </body>
</html>