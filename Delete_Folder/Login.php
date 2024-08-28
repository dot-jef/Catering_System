<?php
    session_start();
    include('core/db.php'); // Include the database connection file
    
    
    if (isset($_SESSION['username'])){
        $usernames = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='$usernames'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
        // if the logged user is a user, redirect to user homepage
        if ($row['role'] == 'user'){
            header('Location: user/userhp.php');
        } else {
            header('Location: admin/admin.php');
        }
    }
    
    // Function to display incorrect input
    function loginFailed(){
        echo ' ';
        if ($_POST){
            echo '<h5 style="color:red;">Incorrect username or password!</h5>';
        }
    }

    if ($_POST) {
        // Retrieve username and password from the login form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Check user credentials
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {   
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $username; // Set session variable
                if ($row['role'] == 'user'){
                    header('Location: user/userhp.php'); // Redirect to home page 
                } else if ($row['role'] == 'admin'){
                    header('Location: admin/admin.php');
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
    <title>Login</title>
    <link rel="stylesheet" href="css\Login.css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
    <div class="header">
        <h1>FNOF</h1>
    </div>
</head>
<body>
    <div class="login-container">
        <div class="header-container">
            <h2>LOG IN</h2>
            <form method="post"> 
        </div>
        <div class="form-group">         
            <label for="username">Username</label>
           <input type="text" id="username" name="username" required>
           
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="typepass" name="password" required>
            <input type="checkbox" onclick="Toggle()">
            <strong>Show Password</strong>

        </div>
        <a href="homepage.php"><button class="login-button" type="submit" name='submit'><b>LOG IN</b></button></a>
        <?php loginFailed() ?>
        <h4 style="color:black">Don't have an account? <a href="Register.php" style="text-decoration: none; color: blue;">Create account</a></h4> 
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
    </script>
</body>
</html>