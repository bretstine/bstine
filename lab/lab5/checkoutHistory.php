<?php

    function displayCheckoutHistory() {
        
        include '../../dbConnection.php';
        $conn = getDatabaseConnection();
        
        $sql = "SELECT * FROM `tc_checkout` NATURAL JOIN tc_device NATURAL JOIN tc_user WHERE deviceId = :deviceId";
        
        $namedParam = array(":deviceId"=>$_GET['deviceId']);
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParam);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo $record['firstName'] . " " . $record['lastName'] . "<br />";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Checkout History </title>
        <meta charset="utf-8" />

        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <h2><u>Checkout History</u></h2>
        
        <?=displayCheckoutHistory()?>

    </body>
</html>