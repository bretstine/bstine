<?php

    include '../../dbConnection.php';
    $conn = getDatabaseConnection("finalproject");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $namedParameters = array();
    $namedParameters[':username'] = $username;
    $namedParameters[':password'] = $password;
    
    $sql = "SELECT * 
            FROM `fp_admin` 
            WHERE username = :username 
            AND password = :password";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $login = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($login)) {
        print "invalid";
    } else {
        print "success";
    }
    
?>