<?php

    $host = 'localhost';
    $dbname = 'tcp';
    $username = "root";
    $password = "";
    
    //this line of code creates a database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //displays database related errors
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    function usersWithanA() {
        global $dbConn;
        $sql = "SELECT * FROM `tc_user` WHERE firstName LIKE 'A%'";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach($records as $records) {
            echo $records['firstName'] . " " . $records['lastName'] . " -- " . $records['email'] . "<br />";
        }
    }
    
    function devicesBetween(){
        global $dbConn;
        $sql = "SELECT * FROM `tc_device` WHERE price < 1000 and price > 300 ORDER BY price";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $records) {
            echo $records['deviceId'] . " " . $records['deviceName'] . " -- " . $records['price'] . "<br />";
        }
    }
    
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h3> Users whose first name starts with an A: </h3>
        <?=usersWithanA()?>
        
        <br />
        <h3> Devices between $300 and $1000 </h3>
        <?=devicesBetween()?>
    </body>
</html>