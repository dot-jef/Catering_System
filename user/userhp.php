<?php
    session_start();
    include('../core/db.php');

    if (!isset($_SESSION['username'])){
        header('Location: ../homepage.php');
        exit();
    }

    if ($_POST){
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact_form (user_id, user_username, user_email, message) VALUES ('$id', '$username', 
                '$email', '$message')";
        $query = $conn->query($sql);
    }

    $conn->close();
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catering</title>
    <!-- <link rel="stylesheet" href=" css\bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../font-awesome-4.7.0\css\font-awesome.min.css">
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
                <li><a href="#food">Category</a></li>
                <!-- <li><a href="#food-menu">Menu</a></li> -->
                <li><a href="#contact">Contact</a></li>
                <li id="haha"><a href="profile.php"><b><i class="fa fa fa-user"></i>Profile</b></a></li>
            </ul>
            <h1 class="logo">FNOF</h1>
        </div>
    </nav>  
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1 class="main-title" id="home"><b>Five Names, One Feast</b></h1>
            <p id="angascater"><i>CATERING SERVICES</i></p>
            <a href="form.php" class="btn btn-primary"><i class=" fa fa fa-plus-circle"></i> Reserve Now!</a>
        </div>
    </section>
    <section id="food">
        <h2>Offered Services</h2>
        <div class="food-container container">
            <div class="food-type vegetable">
            <a href="../equipments.php">
                <div class="img-container">
                    <img src="../Images\equipment.jpg" alt="error" />
                    <div class="img-content">
                        <h3>Equipments</h3>
                    </div>
                </div>
            </a>
            </div>
            <div class="food-type grin">
                <a href="../foods.php">
                    <div class="img-container">
                        <img src="../Images\food.jpg" alt="error" />
                        <div class="img-content">
                            <h3>Foods</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="food-type grin">
                <a href="../occasion.php">
                    <div class="img-container">
                        <img src="../Images\occasion.jpg" alt="error" />
                        <div class="img-content">
                            <h3>Occasions</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <section id="contact">
        <div class="contact-container container">
            <div class="contact-img">
                <img src="../Images\bulok.jpg" alt="" />
            </div>
            <div class="form-container">
                <h2>Contact Us</h2>
                <form id="contactForm" method="post" class="contact-form">
                    <textarea name="message" cols="30" rows="6" placeholder="Type Your Message" required></textarea>
                    <button type="submit" class="btn-submit">Submit</button>
                </form>
                <div id="successMessage" style="display: none; color: green; margin-top: 10px;">Form submitted successfully!</div>
            </div>
        </div>
    </section>

</body>

</html>