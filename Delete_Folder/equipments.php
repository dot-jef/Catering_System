<?php
  session_start();
  include('core/db.php');

  if (isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // if the logged user is a user, redirect to user homepage
    if ($row['role'] == 'admin'){
        header('Location: ../admin/admin.php');
    }
}
    $conn->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catering</title>
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
    <!--<link rel="stylesheet" href=" css\bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/homepage.css" />
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">0
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="#Package1">Package 1</a></li>
                <li><a href="#Package2">Package 2</a></li>
                <li><a href="#Package3">Package 3</a></li>
                <li><a href="#Package4">Package 4</a></li>
            </ul>
           <a href="functions/hpredirect.php"><h1 class="logo"><i class="fa fa fa-home"></i>FNOF</h1></a>
        </div>
    </nav>  
    <section class="showcase-equipments" id="introduction">
        <div class="showcase-container">
            <h1 class="main-title" id="home"><b style="background-image:url('Images\BGEQ.jpg')">EQUIPMENTS</b></h1>
            <p id="angascater"><i></i></p>
        </div>
    </section>
    <section id="Package1">
        <div class="about-wrapper container">
            <div class="about-equipments">
                <h1>PACKAGE 1</h1>
                <h3>Table</h3>
                <h3>Chairs</h3>
                <h3>Tents</h3>
                
            </div>
            <div class="about-img">
                <img src="Images\p1.png"/>
            </div>
        </div>
    </section>

    <section id="Package2">
        <div class="about-wrapper container">
            <div class="about-img">
                <img src="Images\p2.png"/>
            </div>
            <div class="about-equipments">
            <h1>PACKAGE 2</h1>
                <h3>Table</h3>
                <h3>Chairs</h3>
                <h3>Tents</h3>
                <h3>Balloons</h3>
            </div>
        </div>
    </section>

    <section id="Package3">
        <div class="about-wrapper container">
            <div class="about-equipments">
                <h1>PACKAGE 3</h1>
                <h3>Table</h3>
                <h3>Chairs</h3>
                <h3>Tents</h3>
                <h3>Balloons</h3>
                <h3>Mascots</h3>
                
            </div>
            <div class="about-img">
                <img src="Images\p3.png"/>
            </div>
        </div>
    </section>

    <section id="Package4">
        <div class="about-wrapper container">
            <div class="about-img">
                <img src="Images\p4.png"/>
            </div>
            <div class="about-equipments">
            <h1>PACKAGE 4</h1>
                <h3>Table</h3>
                <h3>Chairs</h3>
                <h3>Tents</h3>
                <h3>Balloons</h3>
                <h3>Mascots</h3>
                <h3>Photobooth</h3>
            </div>
        </div>
    </section>
    
 
</body>

</html>