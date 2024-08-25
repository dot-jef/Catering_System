<?php
    session_start();
    include('core/db.php');

    if (!isset($_SESSION['username'])){
        header('Location: homepage.php');
        exit();
    }

    if ($_POST){
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];
        $oldpass = $_POST['old-password'];
        $password = $_POST['new-password'];
        $cpassword = $_POST['c-new-password'];
        $newPass = password_hash($password, PASSWORD_DEFAULT);

        $check_sql = "SELECT * FROM users WHERE username='$newUsername'";
        $check_result = $conn->query($check_sql);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result =  $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if ($check_result->num_rows > 0) {
            echo '';
        } else if (!password_verify($oldpass, $row['password'])){
            echo '';
        } else if ($password != $cpassword) {
            echo '';
        } else {
            $update = "UPDATE users SET username = '$newUsername', email = '$newEmail', password = '$newPass' WHERE id = '$id'";
            if ($conn->query($update)){
                $_SESSION['username'] = $newUsername;
                $_SESSION['email'] = $newEmail;
                header('Location: user/userhp.php');
            }
        }
    }

    function username(){
        echo ' ';
        include('core/db.php');

        if ($_POST){
            // Get username input
            $newUsername = $_POST['username'];
            // Check if username already exists
            $check_sql = "SELECT * FROM users WHERE username='$newUsername'";
            $check_result = $conn->query($check_sql);
            if ($check_result->num_rows > 0) {
                // shows error that username already exists
                echo '<h5 style="color:red;">Username already exists!</h5>';
            }
        }
    }

    function checkold(){
        echo ' ';
        include('core/db.php');

        $username = $_SESSION['username'];

        if ($_POST){
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result =  $conn->query($sql);
            $row = $result->fetch_assoc();

            $oldpass = $_POST['old-password'];
            if (!password_verify($oldpass, $row['password'])){
                echo '<h5 style="color:red;">Incorrect Old Password!</h5>';
            }
        }
    }

    function confirmpass(){
        echo ' ';
        include('core/db.php');

        if ($_POST){
            // Get passwords input
            $password = $_POST['new-password'];
            $cpassword = $_POST['c-new-password'];

            // Check if password confirmation is same as password
            if ($password != $cpassword) {
                // shows error that confirm password is incorrect
                echo '<h5 style="color:red;">Incorrect Password Confirmation!</h5>';
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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="profile-container">
    <a href="#" onclick="history.go(-1)" class="btn-back">Back</a>
        <h1>Edit Profile</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" id="name" placeholder="New username" name="username" required>
                <?php username() ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="New email Address" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Old Password</label>
                <input type="password" id="toggls" placeholder="Old Password" name="old-password" required>
                <input type="checkbox" onclick="Toggls()">
                <strong>Show Password</strong> 
                <?php checkold() ?>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="typepass" placeholder="New Password" name="new-password" required>
                <input type="checkbox" onclick="Toggle()">
                <strong>Show Password</strong> 
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="cpassword" placeholder="Confirm new Password" name="c-new-password" required>
                <input type="checkbox" onclick="confirm()">
                <strong>Show Password</strong> 
                <?php confirmpass() ?>
            </div>
            <button type="submit" class="save-btn">Save Changes</button>
        </form>
    </div>
    <script>
        function Toggle() {
            let temp = document.getElementById("typepass");
            if (temp.type === "password"){
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
        function Toggls() {
            let temp = document.getElementById("toggls");
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
