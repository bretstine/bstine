<?php

    $host = 'localhost';
    $dbname = 'tcp';
    $username = 'root';
    $password = '';
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    function getUsersAndDepartments() {
        global $dbConn;
        
        $sql = "SELECT tc_checkout.userId, firstName, lastName, tc_device.deviceId, deviceName, checkoutDate, dueDate FROM `tc_checkout` JOIN tc_user JOIN tc_device 
                ON tc_user.userId = tc_checkout.userId AND tc_checkout.deviceId = tc_device.deviceId WHERE deviceType = 'Tablet' ORDER BY userId";
                
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $records) {
            echo $records['userId'] . '. ' . $records['firstName'] . ' ' . $records['lastName'] . '  --  ' . $records['deviceId'] . '  |  ' . $records['deviceName'] . '  |  ' . $records['checkoutDate'] . '  |  ' . $records['dueDate'] . "<br />";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> SQL Joins </title>
    </head>
    <body>
        
        <h2> Users and their corresponding departments (order by last name) </h2>
        
        <?=getUsersAndDepartments()?>
        
    </body>
</html>