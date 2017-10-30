<?php

    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    function displayUsers() {
        global $conn;
        
        $sql = "SELECT * 
                FROM `tc_user`
                ORDER BY lastName";
                
        $statment = $conn->prepare($sql);
        $statment->execute();
        $users = $statment->fetchAll(PDO::FETCH_ASSOC);
        
        return $users;
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Page </title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

        <script>
            function confirmDelete(firstName, lastName) {
                return confirm("Are you sure you want to delete user " + firstName + lastName + "?");
            }
        </script>
    </head>
    <body>
        <header><h1> TCP ADMIN PAGE </h1></header>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr />
        
        <form action="addUser.php">
            <input type="submit" value="Add new User" />
        </form>
        
        <form action="logout.php">
            <input type="submit" value="Logout" />
        </form>
        
        <br /> <br />
        
        <?php
        
        $users = displayUsers();
        
        foreach ($users as $user) {
            echo $user['userId'] . " -- " . $user['firstName'] . " " . $user['lastName'];
            echo "[<a href='updateUser.php?userId=" . $user['userId'] . "'> update </a>]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\" " . $user['firstName'] . " \", \" " . $user['lastName'] . " \")'>
                    <input type='hidden' name='userId' value='" . $user['userId'] . "' />
                    <input type='submit' value='Delete'>
                  </form>";
            echo "<br />";
        }
        
        ?>

    </body>
</html>