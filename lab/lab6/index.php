<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Admin Login Page </title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        
        <header><h1> Admin Login </h1></header>
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
            
            <input type="submit" name="login" value="Login" />
        </form>
        

    </body>
</html>