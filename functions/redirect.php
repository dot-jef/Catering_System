<?php
    session_start();
    include('db.php');

    if (!isset($_SESSION['username'])){
        header('Location: ../homepage.php');
    } else {
        header('Location: ../user/userhp.php');
    }
    
    $conn->close();
?>
