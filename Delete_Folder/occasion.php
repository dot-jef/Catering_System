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
           <a href="functions/hpredirect.php"><h1 class="logo"><i class="fa fa fa-home"></i>FNOF</h1></a>
        </div>
    </nav>  
    <section class="showcase-occasion" id="introduction">
        <div class="showcase-container">
            <h1 class="main-title" id="home"><b style="background-image:url('Images\okasyon.jpg')">OCCASIONS</b></h1>
            <p id="angascater"><i>"Celebrate the small things, for in them lie the seeds of great joy"</i></p>
        </div>
    </section>
    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <h2>WEDDING</h2>
                <p>
                    "Love doesn't make the world go around. Love is what makes the ride worthwhile"
                </p>
            </div>
            <div class="about-img">
                <img src="Images\wedding.jpg" alt="food" />
            </div>
        </div>
    </section>

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-img">
                <img src="Images\birthday.jpg" alt="food" />
            </div>
            <div class="about-text">
                <h2>BIRTHDAY</h2>
                <p>
                    "Count your age by friend, not years. Count your life by smiles, not tears."
                </p>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <h2>ANNIVERSARY</h2>
                <p>
                    "The best thing to hold onto in life is each other"
                </p>
            </div>
            <div class="about-img">
                <img src="Images\anniversary.jpg" alt="food" />
            </div>
        </div>
    </section>

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-img">
                <img src="Images\grad.jpg" alt="food" />
            </div>
            <div class="about-text">
                <h2>GRADUATION</h2>
                <p>
                    "The future belongs to those who believe in the beauty of their dreams"
                </p>
            </div>
        </div>
    </section>
    
</html>

</body>

</html>