<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "DELETE FROM `fp_games`
            WHERE gameId = :gameId";
            
    $namedParameter = array();
    $namedParameter[':gameId'] = $_GET['gameId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameter);
    
    header("Location: indexAdmin.php");

?>