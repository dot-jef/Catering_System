<?php
    session_start();
    include('core/db.php');

    if (isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
        // if the logged user is a user, redirect to user homepage
        if ($row['role'] == 'user'){
            header('Location: user/userhp.php');
        } else {
            header('Location: admin/admin.php');
        }
    }

    function username(){
        echo ' ';
        include('core/db.php');

        if ($_POST){
            // Get username input
            $username = $_POST['username'];
            // Check if username already exists
            $check_sql = "SELECT * FROM users WHERE username='$username'";
            $check_result = $conn->query($check_sql);
            if ($check_result->num_rows > 0) {
                // shows error that username already exists
                echo '<h5 style="color:red;">Username already exists!</h5>';
            }
        }
    }

    function confirm(){
        echo ' ';
        include('core/db.php');

        if ($_POST){
            // Get passwords input
            $password = $_POST['password'];
            $cpassword = $_POST['c-password'];

            // Check if password confirmation is same as password
            if ($password != $cpassword) {
                // shows error that confirm password is incorrect
                echo '<h5 style="color:red;">Incorrect Password Confirmation!</h5>';
            }
        }
    }

    if ($_POST) {
        // Retrieve username, email and password from the register form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword= $_POST['c-password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if username already exists
        $check_sql = "SELECT * FROM users WHERE username='$username'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 0) {
            
            if ($password === $cpassword) {
                // Insert new user into the database
                $insert_sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$hashed_password')";
                if ($conn->query($insert_sql) === TRUE) {
                    $findacc = "SELECT * FROM users WHERE username = '$username'";
                    $acc_result = $conn->query($findacc);
                    $row = $acc_result->fetch_assoc();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    header('Location: user/userhp.php'); // Goes to user home page after creating new account
                } else {
                    echo "Error: " . $insert_sql . "<br>" . $conn->error;
                }
            } 
        }
    }
    
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Register.css">

    <title>Register</title>
    <div class="header">
        <h1>FNOF</h1>
    </div>
</head>
<body>
    <div class="header-container">
        <a href="Login.php" class="btn-back">Back</a>
    <div class="login-container">
        <h2> SIGN UP</h2>
        <form method="post"> 
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Username" name="username" required>
                <?php username() ?>
            </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="ex.FNOF@gmail.com"  name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password" name="password"  required minlength="6">
            <input type="checkbox" onclick="Toggle()">
            <strong>Show Password</strong> 
        </div>
        <div class="form-group">
            <label for="c-password">Confirm Password</label>
            <input type="password" id="cpassword" placeholder="Confirm Password" name="c-password" required>
            <?php confirm() ?>
            <input type="checkbox" onclick="confirm()">
            <strong>Show Password</strong>
            
        </div>
        <button type="submit" value="Register"><b>Register</b></button>
        </form>
    </div>
    <script>
        function Toggle() {
            let temp = document.getElementById("password");
            if (temp.type === "password"){
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
        function confirm() {
            let temp = document.getElementById("cpassword");
            if (temp.type === "password"){
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
    </script>
    
</body>
</html>
