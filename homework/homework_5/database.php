<?php    

    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $movieTitle = $_GET['title'];
    $movieGenre = $_GET['genre'];
    $movieYear = $_GET['year'];
    
    $sql = "INSERT ONTO `db_movies` 
            (movieTitle, movieGenre, movieYear, time)
            VALUES 
            (:title, :genre, :year, CURRENT_TIMESTAMP)";
            
    $namedParameters = array();
    $namedParameters[':title'] = $movieTitle;
    $namedParameters[':genre'] = $movieGenre;
    $namedParameters[':year'] = $movieYear;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
?>