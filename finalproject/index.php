<?php
    session_start();

    include 'functions/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homepage </title>
        
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand active" href="index.php">Home <span class="sr-only">(current)</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <form class="navbar-form">
                <button type="submit" class="btn btn-link menu" name="a-z">A-Z</button>
                <button type="submit" class="btn btn-link menu" name="z-a">Z-A</button>
                <button type="submit" class="btn btn-link menu" name="highest">Highest Price</button>
                <button type="submit" class="btn btn-link menu" name="lowest">Lowest Price</button>
                <button type="submit" class="btn btn-link menu" name="rating">ESRB</button>
              </form> 
            </div>
          </div>
          <div class="navbar-form navbar-right">
            <a href="#" class="btn btn-default loginLoadModal" role="button">Login</a>
          </div>
          <form class="navbar-form navbar-right">
              <div class="input-group my-group">
                  <input type="text" name="gameSearch" class="form-control" placeholder="Search for Game">
                  <span class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-default my-group-button ">Search</button>
                  </span>
              </div>
          </form>
        </nav>
        
        
        <div class="container">
          <table class="table table-sm table-bordered table-striped">
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
              </tr>
            </thead>
            <tbody>
              <?=displayGames()?>
            </tbody>
          </table>
        </div>
        
        
        <!-- Modal for Login -->
        <div class="modal fade" id="loginInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="post">
                <div class="modal-header">
                  <h5 class="modal-title">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="username" name="username" class="form-control" placeholder="Username"/>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input type="password" id="password" name="password" class="form-control"    placeholder="Password"/>
                  </div>
                  <div id="invalidLogin"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="loginLink" name="login" value="login">Login</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>  
        
        <script>
            $(document).ready( function(){
        
                $(".loginLoadModal").click( function(){
                    
                    //alert($(this).attr('id'));
                    $('#loginInfoModal').modal("show");
                    
                    $('#loginLink').click( function(){
                      
                        $.ajax({
            
                            type: "POST",
                            url: "functions/adminLogin.php",
                            data: { username: $("#username").val(),
                                    password: $("#password").val()
                            },
                            success: function(response) {
                                if (response == "success") {
                                    location.href = "indexAdmin.php";
                                }
                                else if (response == "invalid") {
                                    $("#invalidLogin").empty();
                                    $("#invalidLogin").append("<span>Invalid username or password</span>");
                                }
                            }
                            
                        });//ajax
                    
                    }); //login 
                    
                }); //.getLink click
            
            }); //document.ready
        </script>
    </body>
</html>