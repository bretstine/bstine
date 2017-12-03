<?php    

    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $movie_title = $_GET['movie_title'];
    $sql = "INSERT ONTO `db_movies`"
    
    
?>