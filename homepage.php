<?php
    session_start();
    include('core/db.php');

    if (isset($_SESSION['username'])){
        header('Location: user/userhp.php');
    }
    $conn->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catering</title>
    <!-- <link rel="stylesheet" href="css\bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/homepage.css" />
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#food">Category</a></li>
                <li id="haha"><a href="Login.php" class="login-btn"><b>LOG IN</b></a></li>
            </ul>
            <h1 class="logo">FNOF</h1>
        </div>
    </nav>  
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1 class="main-title" id="home"><b>Five Names, One Feast</b></h1>
            <p id="angascater"><i>CATERING SERVICES</i></p>
        </div>
    </section>
    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <p class="small">About Us</p>
                <h2>We Are Happy To Serve You</h2>
                <p>
                    At Five Names, One Feast, we specialized in delivering top notch catering services that turn
                    every meal into memorable experience.
                </p>
            </div>
            <div class="about-img">
                <img src="Images\foodsbg.jpg" alt="food" />
            </div>
        </div>
    </section>
    <section id="food">
        <h2>Offered Services</h2>
        <div class="food-container container">
            <div class="food-type vegetable">
            <a href="equipments.php">
                <div class="img-container">
                    <img src="Images\equipment.jpg" alt="error" />
                    <div class="img-content">
                        <h3>Equipments</h3>
                    </div>
                </div>
            </a>
            </div>
            <div class="food-type grin">
                <a href="foods.php">
                    <div class="img-container">
                        <img src="Images\food.jpg" alt="error" />
                        <div class="img-content">
                            <h3>Foods</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="food-type grin">
                <a href="occasion.php">
                    <div class="img-container">
                        <img src="Images/occasion.jpg" alt="error" />
                        <div class="img-content">
                            <h3>Occasions</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

</html>

</body>

</html>