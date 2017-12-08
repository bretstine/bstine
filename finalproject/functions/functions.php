<?php
    session_start();
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection();

    function displayGames() {
        global $conn;
        
        $sql = "SELECT *
                FROM `fp_games`
                NATURAL JOIN `fp_developer`
                WHERE 1 ";
            
        $namedParameters = array();
        if (isset($_GET['submit'])) {
            $namedParameters[':gameName'] = $_GET['gameSearch'];
            $sql .= " AND gameName = :gameName";
        }
        
        if (isset($_GET['rating'])) {
            $sql .= " ORDER BY gameRating";
        }
        if (isset($_GET['a-z'])) {
            $sql .= " ORDER BY gameName ASC";
        } 
        if (isset($_GET['z-a'])) {
            $sql .= " ORDER BY gameName DESC";
        }
        if (isset($_GET['highest'])) {
            $sql .= " ORDER BY gamePrice DESC";
        }
        if (isset($_GET['lowest'])) {
            $sql .= " ORDER BY gamePrice ASC";
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($data as $print) {
            echo "<tr>";
            echo "<td>".''.$print['gameName'].''."</td>"; 
            echo "<td>".''.$print['developerName'].''."</td>"; 
            echo "<td>".''.$print['gameGenre'].''."</td>"; 
            echo "<td>".''.$print['gameDescription'].''."</td>"; 
            echo "<td>".''.$print['gameRelease'].''."</td>"; 
            echo "<td>".''.$print['gameRating'].''."</td>"; 
            echo "<td>".''.$print['gameScore'].''."/10</td>"; 
            echo "<td>$".''.$print['gamePrice'].''."</td>"; 
            echo "</tr>";
        }
    }
    
    function displayGamesV2() {
        global $conn;
        
        $sql = "SELECT *
                FROM `fp_games`
                NATURAL LEFT JOIN `fp_developer`
                WHERE 1 ";
        
        $namedParameters = array();
        if (isset($_GET['submit'])) {
            $namedParameters[':gameName'] = $_GET['gameSearch'];
            $sql .= " AND gameName = :gameName";
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($data as $print) {
            echo "<tr>";
            echo "<td>".''.$print['gameName'].''."</td>"; 
            echo "<td>".''.$print['developerName'].''."</td>"; 
            echo "<td>".''.$print['gameGenre'].''."</td>"; 
            echo "<td>".''.$print['gameDescription'].''."</td>"; 
            echo "<td>".''.$print['gameRelease'].''."</td>"; 
            echo "<td>".''.$print['gameRating'].''."</td>"; 
            echo "<td>".''.$print['gameScore'].''."/10</td>"; 
            echo "<td>$".''.$print['gamePrice'].''."</td>"; 
            echo "<td><a href='updateIndex.php?gameId=".$print['gameId']."' class='btn btn-primary'>Update</a>";
            echo "<form action='deleteGame.php' style='display:inline' onsubmit='return confirmDelete(\" " . $print['gameName'] . " \")'>
                    <input type='hidden' name='gameId' value='" . $print['gameId'] . "' />
                    <input type='submit' class='btn btn-danger' value='Delete'>
                  </form></td>"; 
            echo "</tr>";
        }
        
    }
    
    function getGame($gameId) {
        global $conn;
        
        $sql = "SELECT * FROM `fp_games` WHERE gameId = :gameId";
    
        $namedParameters = array();
        $namedParameters[':gameId'] = $gameId;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    function avgDisplay() {
        global $conn;
        
        $sql = "SELECT AVG(gamePrice) AS average FROM `fp_games`";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $average = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $average;
    }
    
    function countDisplay() {
        global $conn;
        
        $sql = "SELECT COUNT(DISTINCT(developerName)) AS count FROM `fp_developer`";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $count;
    }
    
    function sumDisplay() {
        global $conn;
        
        $sql = "SELECT SUM(gamePrice) AS sum FROM `fp_games`";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $sum = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $sum;
    }
?>