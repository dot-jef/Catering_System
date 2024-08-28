<?php
    session_start();
    include('../core/db.php');

    if (!isset($_SESSION['username'])){
        header('Location: ../homepage.php');
        exit();
    } else {
        $user = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
        // if the logged user is a user, redirect to user homepage
        if ($row['role'] == 'admin'){
            header('Location: ../admin/admin.php');
        }
    }

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <div class="header-container">
        <a href="#" onclick="history.go(-1)" class="btn-back">Back</a>
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <p><strong>ID:</strong><?php echo " ".$id;?></p>
            <p><strong>Username:</strong><?php echo " ".$username;?></p>    
            <p><strong>Email:</strong><?php echo " ".$email;?></p>
            <!-- <p><strong>Password:</strong> 
                <span id="password-text">******</span>
                <button type="button" id="togglePassword">Show</button>
            </p> -->
        </div>
        <a href="../edit-profile.php" class="edit-btn"><b>Edit Profile</b></a>
        <a href="my_reservations.php" class="edit-btn"><b>My Reservations</b></a>
        <a href="../functions/logout.php"><button class="edit-btn"><b>Logout</b></button></a>
    </div>
    <!-- <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            var passwordText = document.getElementById('password-text');
            var toggleButton = document.getElementById('togglePassword');
            
            if (passwordText.textContent === '******') {
                passwordText.textContent = '123456';
                toggleButton.textContent = 'Hide';
            } else {
                passwordText.textContent = '******';
                toggleButton.textContent = 'Show';
            }
        });
    </script> -->
</body>
</html>
