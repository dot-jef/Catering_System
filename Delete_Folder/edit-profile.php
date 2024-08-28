<?php
    session_start();
    include('core/db.php');

    if (!isset($_SESSION['username'])){
        header('Location: homepage.php');
        exit();
    }

    $error = 0;
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result =  $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_POST){

        $oldpass = $_POST['old-password'];

        if (!empty($_POST['username'])){
            $newUsername = $_POST['username'];
            $check_sql = "SELECT * FROM users WHERE username='$newUsername'";
            $check_result = $conn->query($check_sql);
            if ($check_result->num_rows > 0) {
                echo '';
                $error++;
            } else if (!password_verify($oldpass, $row['password'])){
                echo '';
                $error++;
            } else {
                $updateNameSuccess = TRUE;
            }
        }

        if (!empty($_POST['email'])){
            $newEmail = $_POST['email'];
            if (!password_verify($oldpass, $row['password'])){
                echo '';
                $error++;
            } else {
                $updateEmailSuccess = TRUE;
            }
        }

        if (!empty($_POST['new-password'])){
            $password = $_POST['new-password'];
            if (!empty($_POST['c-new-password'])){
                $cpassword = $_POST['c-new-password'];
                if ($password === $cpassword) {
                    $newPass = password_hash($password, PASSWORD_DEFAULT);
                    if (!password_verify($oldpass, $row['password'])){
                        echo '';
                        $error++;
                    } else {
                        $updatePassSuccess = TRUE;
                    }
                }
            } else {
                $error++;
            }
        }
        if(!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['new-password'])){
            if ($error == 0){
                if ($updateNameSuccess === TRUE){
                    $updateUsername = $conn->query("UPDATE users SET username = '$newUsername' WHERE id = '$id'");
                    $updateReserveName = $conn->query("UPDATE catering_form SET username = '$newUsername' WHERE user_id = '$id'");
                    $updateContactName = $conn->query("UPDATE contact_form SET user_username = '$newUsername' WHERE user_id = '$id'");
                    $_SESSION['username'] = $newUsername;
                }
                if ($updateEmailSuccess === TRUE){
                    $updateEmail = $conn->query("UPDATE users SET email = '$newEmail' WHERE id = '$id'");
                    $updateReserveEmail = $conn->query("UPDATE catering_form SET email = '$newEmail' WHERE user_id = '$id'");
                    $updateContactEmail = $conn->query("UPDATE contact_form SET user_email = '$newEmail' WHERE user_id = '$id'");
                    $_SESSION['email'] = $newEmail;
                }
                if ($updatePassSuccess === TRUE){
                    $updatePass = $conn->query("UPDATE users SET password = '$newPass' WHERE id = '$id'");
                }
                if ($updateUsername || $updateEmail || $updatePass){
                    if ($row['role'] == 'user'){
                        header('Location: user/userhp.php');
                    } else if ($row['role'] == 'admin'){
                        header('Location: admin/admin.php');
                    }
                } else {
                    echo '';
                }
            }
        }
    }



    function username(){
        echo ' ';
        include('core/db.php');

        if ($_POST){
            // Get username input
            if ($_POST['username'] != NULL){
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
    }

    function checkold(){
        echo ' ';
        include('core/db.php');

        if ($_POST){
            global $username;
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
            if ($_POST['new-password'] != NULL ){
                $password = $_POST['new-password'];
                if ($_POST['c-new-password'] == NULL){
                    echo '<h5 style="color:red;">Password Confirmation Needed!</h5>';
                } else {
                    $cpassword = $_POST['c-new-password'];
                    if ($password != $cpassword) {
                        // shows error that confirm password is incorrect
                        echo '<h5 style="color:red;">Incorrect Password Confirmation!</h5>';
                    }
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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="profile-container">
    <a href="#" onclick="history.go(-1)" class="btn-back">Back</a>
        <h1>Edit Profile</h1>
        <p>Note: old password is always required when changing details </p>
        <form method="post">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" id="name" placeholder="New username" name="username">
                <?php username() ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="New email Address" name="email">
            </div>
            <div class="form-group">
                <label for="password">Old Password:</label>
                <input type="password" id="toggls" placeholder="Old Password" name="old-password" required>
                <input type="checkbox" onclick="Toggls()">
                <strong>Show Password</strong> 
                <?php checkold() ?>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="typepass" placeholder="New Password" name="new-password">
                <input type="checkbox" onclick="Toggle()">
                <strong>Show Password</strong>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password:</label>
                <input type="password" id="cpassword" placeholder="Confirm new Password" name="c-new-password">
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
