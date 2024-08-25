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
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="#">Introduction</a></li>
                <li><a href="#Lutong-bahay">Lutong Bahay</a></li>
                <li><a href="#Appetizer">Appetizer</a></li>
                <li><a href="#Dessert">Dessert</a></li>
                <li><a href="#Pasta">Pasta</a></li>
                <li><a href="#Package">Package</a></li>
            </ul>
           <a href="functions/hpredirect.php"><h1 class="logo"><i class="fa fa fa-home"></i>FNOF</h1></a>
        </div>
    </nav>  
    <section class="showcase-area" id="introduction">
        <div class="showcase-container">
            <h1 class="main-title" id="home"><b>FOOD MENU</b></h1>
            <p id="angascater"><i>"Feasting my way through life, one bite at a time"</i></p>
        </div>
    </section>
    <section id="Lutong-bahay"> 
        <div class="category"><h1>LUTONG BAHAY</h1></div>
        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\menudo.jpeg" alt="pastas" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Menudo</h2>
                    <p>
                        The steaming bowl of menudo, filled with tender beef tripe and aromatic spices, was a comforting
                        delight on a chilly evening.
                    </p>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\caldereta.jpg" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Caldereta</h2>
                    <p>
                       A rich and savory Filipino beef stew, is slow-cooked to perfection with tender chunks of meat, hearty
                       vegetable and a rich sauce.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\lechon.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Lechon</h2>
                    <p>
                        Succulent aroma of the roasted lechon filled the air. its crispy skin crackling enticingly,
                        promising a mouthwatering feast of tender.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\chopsuey.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Chopsuey</h2>
                    <p>
                       Each bite of the delicious chopsuey burst with flavor, as the mix of sauces and textures danced on my 
                       palate.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="Appetizer"> 
        <div class="category"><h1>APPETIZER</h1></div>
        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\EM.jpg" alt="pastas" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Ensaladang Mangga</h2>
                    <p>
                       For a refreshing treat on a hot day, nothing beats a bowl of ensaladang mangga paired with grilled
                       seafood.
                    </p>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\salad.jpeg" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Vegetable Salad</h2>
                    <p>
                        Crisp romaine lettuce tossed with cream acovado, juicy cherry tomatoes, and a sprinkle of feta cheese creates
                        a delightful flavor combination.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\fries.jpeg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Fries</h2>
                    <p>
                        The golden, crispy fries were seasoned to perfection.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\puto.jpeg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Puto</h2>
                    <p>
                      Puto was perfectly steamed, its soft and fluffy texture lovingly cradied by a
                       delicate layer of melted cheese on top.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="Dessert"> 
        <div class="category"><h1>DESSERT</h1></div>
        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\bp.jpeg" alt="pastas" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Buko Pandan</h2>
                    <p>
                      With its vibrant green hue and delightful texture, is a festive
                      treat that brings smiles to every gathering.
                    </p>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\leche.jpeg" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Leche Flan</h2>
                    <p>
                      Its golden caramel sauce glistened under te light
                      , inviting everyone to take a taste of this decadent dessert.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\ice cream.jpeg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Ice Cream</h2>
                    <p>
                        A scoop of ice cream offered a delicate floral note that lingered
                         gently on the tongue, a truly enchanting experience.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\kapejelly.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Coffee Jelly</h2>
                    <p>
                       Chilled and refreshing, the coffee jelly was a delightful
                       surprise, with its unique combination of bitterness and sweetness.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="Pasta"> 
        <div class="category"><h1>PASTA</h1></div>
        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\spag.jpg" alt="pastas" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Tomato Sauce</h2>
                    <p>
                        Steaming plate of spaghetti was twirled artfully, glistening
                         with a rich tomato sauce.
                    </p>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\carbonara.png" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Carbonara</h2>
                    <p>
                       The creamy, rich sauce of carbonara envelopes each stream
                       of pasta, making every bite an indulgent delight.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\aglio.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Aglio Olio</h2>
                    <p>
                        Rich aroma of garlic sizzling in olive oil, promising a comforting bowl of Aglio
                        Olio.
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="Images\bolog.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Bolognese</h2>
                    <p>
                        Slow-cooked to perfection, the bolognese sauce boasted tender
                         ground meat melded with aromatic herbs.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="Package"> 
        <div class="category"><h1>PACKAGES</h1></div>
        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="foods-img">
                    <img src="Images\p11.jpg" alt="pastas" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Package 1</h2>
                    <p>
                        Rice, Lutong Bahay, Dessert, Beverage
                    </p>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="foods-img">
                    <img src="Images\p22.jpg" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Package 2</h2>
                    <p>
                    Rice, Lutong Bahay, Dessert, Beverage, Pasta
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="foods-img">
                    <img src="Images\p33.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Package 3</h2>
                    <p>
                    Rice, Lutong Bahay, Dessert, Beverage, Appetizers
                    </p>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="foods-img">
                    <img src="Images\dessert.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Package 4</h2>
                    <p>
                    Rice, Lutong Bahay, Dessert, Beverage, Appetizers, Pasta
                    </p>
                </div>
            </div>
        </div>
    </section>

    
</html>

</body>

</html>