<?php

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    function getDeviceType() {
        global $conn;
        
        $sql = "SELECT DISTINCT(deviceType) FROM `tc_device` ORDER BY deviceType";
        
        
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option> " . $record['deviceType'] . "</option>";
        }
    }
    
    function displayDevices() {
        global $conn;
        
        $sql = "SELECT * FROM `tc_device` WHERE 1 ";
        
        if (isset($_GET['submit'])) {
            
            $namedParameters = array();
            
            if (!empty($_GET['deviceName'])) {
                // The following query allows SQL injection due to  the single quotes
                // $sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
                
                $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";
                $sql .= " AND deviceName LIKE :deviceName"; // using named parameters
            }
            
            if (!empty($_GET['deviceType'])) {
                $namedParameters[':deviceType'] = $_GET['deviceType'];
                $sql .= " AND deviceType = :deviceType";
            }
            
            if (!empty($_GET['available'])) {
                $namedParameters[':status'] = "A";
                $sql .= " AND status = :status";
            }
            
            if (!empty($_GET['orderByName'])) {
                $sql .= " ORDER BY deviceName ASC";
            } else if (!empty($_GET['orderByPrice'])) {
                $sql .= " ORDER BY price ASC";
            } else {
                $sql .= " ORDER BY deviceName";
            }
        }
        
        //If user types a deviceName
        //    "AND deviceName LIKE '%$_GET['deviceName']%'";
        
        //If user selects deviceType
        //    "AND deviceType = '$_GET['deviceType']'";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
           echo $record['deviceName'] . " | " . $record['deviceType'] . " | " . 
                $record['price'] . " | " . $record['status'] . " | " . 
                "<a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'>Checkout History</a> <br />";
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Device Search </title>
        <meta charset="utf-8" />

        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        
        <header><h1> Technology Center: Checkout System </h1></header>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name" />
            Type:
            <select name="deviceType">
                <option value="">- Select One -</option>
                <?=getDeviceType()?>
            </select>
        
            <br />
            Order by:
            <input type="radio" name="orderByName" id="orderByName" value="name" />
             <label for="orderByName"> Name </label>
            <input type="radio" name="orderByPrice" id="orderByPrice" value="price"/>
             <label for="orderByPrice"> Price </label> 
            <br />
            
            <input type="checkbox" name="available" id="available" />
            <label for="available"> Available </label> 
            <br />
            
            <input class ="sub" type="submit" name="submit" value ="Search">
        </form>
        
        <br />
        <hr />
        <br />
        
        <?=displayDevices()?>
        
        
        <br />
        <hr />
        <br />
        
        <iframe name="checkoutHistory" width="400" height="200"></iframe>
        
    </body>
</html><?php

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    function getDeviceType() {
        global $conn;
        
        $sql = "SELECT DISTINCT(deviceType) FROM `tc_device` ORDER BY deviceType";
        
        
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option> " . $record['deviceType'] . "</option>";
        }
    }
    
    function displayDevices() {
        global $conn;
        
        $sql = "SELECT * FROM `tc_device` WHERE 1 ";
        
        if (isset($_GET['submit'])) {
            
            $namedParameters = array();
            
            if (!empty($_GET['deviceName'])) {
                // The following query allows SQL injection due to  the single quotes
                // $sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
                
                $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";
                $sql .= " AND deviceName LIKE :deviceName"; // using named parameters
            }
            
            if (!empty($_GET['deviceType'])) {
                $namedParameters[':deviceType'] = $_GET['deviceType'];
                $sql .= " AND deviceType = :deviceType";
            }
            
            if (!empty($_GET['available'])) {
                $namedParameters[':status'] = "A";
                $sql .= " AND status = :status";
            }
            
            if (!empty($_GET['orderByName'])) {
                $sql .= " ORDER BY deviceName ASC";
            } else if (!empty($_GET['orderByPrice'])) {
                $sql .= " ORDER BY price ASC";
            } else {
                $sql .= " ORDER BY deviceName";
            }
        }
        
        //If user types a deviceName
        //    "AND deviceName LIKE '%$_GET['deviceName']%'";
        
        //If user selects deviceType
        //    "AND deviceType = '$_GET['deviceType']'";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
           echo $record['deviceName'] . " | " . $record['deviceType'] . " | " . 
                $record['price'] . " | " . $record['status'] . " | " . 
                "<a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'>Checkout History</a> <br />";
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Device Search </title>
        <meta charset="utf-8" />

        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        
        <header><h1> Technology Center: Checkout System </h1></header>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name" />
            Type:
            <select name="deviceType">
                <option value="">- Select One -</option>
                <?=getDeviceType()?>
            </select>
        
            <br />
            Order by:
            <input type="radio" name="orderByName" id="orderByName" value="name" />
             <label for="orderByName"> Name </label>
            <input type="radio" name="orderByPrice" id="orderByPrice" value="price"/>
             <label for="orderByPrice"> Price </label> 
            <br />
            
            <input type="checkbox" name="available" id="available" />
            <label for="available"> Available </label> 
            <br />
            
            <input class ="sub" type="submit" name="submit" value ="Search">
        </form>
        
        <br />
        <hr />
        <br />
        
        <?=displayDevices()?>
        
        
        <br />
        <hr />
        <br />
        
        <iframe name="checkoutHistory" width="400" height="200"></iframe>
        
    </body>
</html>