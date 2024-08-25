<?php
    session_start();
    include('../core/db.php');

    // if not logged in, redirect to homepage
    if (!isset($_SESSION['username'])){
        header('Location: ../homepage.php');
        
    // else, redirect to user homepage
    } else {
        header('Location: ../user/userhp.php');
    }
    
    $conn->close();
?>
