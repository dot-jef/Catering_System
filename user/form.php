<?php
    session_start();
    include('../core/db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture form data
        $id = $_SESSION['id'];
        $user = $_SESSION['username'];
        $email = $_SESSION['email'];
        $fullName = $_POST['fullname'];
        $phoneNumber = $_POST['phone'];
        $barangay = $_POST['barangay'];
        $address = $_POST['address'];
        $location = $barangay . " " . $address;
        $landmark = $_POST['landmark'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $occasion = $_POST['occasion'];
        $equipmentPack = $_POST['equipment-package'];
        $foodPack = $_POST['food-package'];
        $comment = $_POST['comment'];

        if ($occasion == 'others'){
            $occasion = $_POST['other-occasion'];
        }
        
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO catering_form (user_id, username, email, full_name, phone_number, location, landmark, 
                date_time, occasion, equipment_pack, food_pack, comment) VALUES ('$id', '$user', '$email', '$fullName', 
                '$phoneNumber', '$location', '$landmark', '$date $time', '$occasion', '$equipmentPack', '$foodPack', '$comment')";

        if($conn->query($sql) == TRUE) {
            echo '<script> window.alert("sometext");</script>';
            header('Location: userhp.php');
        }

        // Close the connection
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Form</title>
    <link rel="stylesheet" href="../css\bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <div class="col-4 mt-5 mb-5 text-center choices" id="equipment-pack">
        <h2>EQUIPMENT PACKAGES</h2>
        <hr>
        <p>Package 1</p>
        <a href="#"><img src="../Images\p1.png"/></a>
        <hr>
        <p>Package 2</p>
        <a href="#"><img src="../Images\p2.png"/></a>
        <hr>
        <p>Package 3</p>
        <a href="#"><img src="../Images\p3.png"/></a>
        <hr>
        <p>Package 4</p>
        <a href="#"><img src="../Images\p4.png"/></a>
    </div>
    <div class="container col-4 mt-5 mb-5 p-4">
        <form method="post">
        <h1> Advance Catering Form</h1>
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" placeholder="ex.Juan Dela Cruz" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" placeholder="ex.09*********" name="phone" required>
        </div>
        <div class="form-group">
            <label for="location">Dropoff Location</label>
            <select name="barangay" required>
                <option value="">-----</option>
                <option value="cabezas">Cabezas</option>
                <option value="cabuco">Cabuco</option>
                <option value="de ocampo">De Ocampo</option>
                <option value="lallana">Lallana</option>
                <option value="san agustin">San Agustin</option>
                <option value="osorio">Osorio</option>
                <option value="conchu">Conchu</option>
                <option value="hugo perez">Hugo Perez</option>
                <option value="aguado">Aguado</option>
                <option value="gregorio">Gregorio</option>
                <option value="inocencio">Inocencio</option>
                <option value="lapidario">Lapidario</option>
                <option value="luciano">Luciano</option>
            </select>
            <input type="text" id="location" placeholder="ex.(blk, lot, st. subd. bldg.no.)" name="address" required>
            <input type="text" placeholder="Nearest Landmark" name="landmark" required>
        </div>
        <div class="form-group">
            <label for="date">Dropoff Date</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Dropoff Time</label>
            <input type="time" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="occasiontype">Type of Occasion</label>
            <select name="occasion" id="occasiontype" required>
                <option value="wedding">Wedding</option>
                <option value="birthday">Birthday</option>
                <option value="anniversary">Anniversary</option>
                <option value="others">Others</option>
            </select>
            <label for="Others">If others, what occasion?</label>
            <input type="text" id="Others" placeholder="ex. (Graduation)" name="other-occasion">
        </div>
        <div class="form-group">
            <label for="Equipment types">Equipment Packages</label>
            <select name="equipment-package" id="equipment-types" required>
                <option value="none">None</option>
                <option value="package 1">Package 1</option>
                <option value="Package 2">Package 2</option>
                <option value="package 3">Package 3</option>
                <option value="package 4">Package 4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Food package">Food Packages</label>
            <select name="food-package" id="food-types" required>
                <option value="none">None</option>
                <option value="package 1">Package 1</option>
                <option value="Package 2">Package 2</option>
                <option value="package 3">Package 3</option>
                <option value="package 4">Package 4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comments">Additional Comments/Requests</label>
            <textarea name="comment" id="comments" rows="3" placeholder="Leave a comment"></textarea>
        </div>
        <button type="submit">Reserve Now</button>
        </form>
        <center><button id="cancel"><a id="cancel" href="userhp.php">Cancel</a></button></center>
    </div>
    <div class="col-4 mt-5 mb-5 text-center choices" id="food-pack">
        <h2>FOODS PACKAGES</h2>
        <hr>
        <p>Package 1</p>
        <a href="#"><img src="../Images\p11.jpg"/></a>
        <hr>
        <p>Package 2</p>
        <a href="#"><img src="../Images\p22.jpg"/></a>
        <hr>
        <p>Package 3</p>
        <a href="#"><img src="../Images\p33.jpg"/></a>
        <hr>
        <p>Package 4</p>
        <a href="#"><img src="../Images\dessert.jpg"/></a>
    </div>
    
</body>
</html>