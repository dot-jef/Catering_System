<?php
    session_start();
    include('../core/db.php');

    if (!isset($_SESSION['username'])){
        header('Location: ../homepage.php');
        exit();
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Service Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h2>FNOF ADMIN</h2>
            <nav>
                <ul>
                    <li><a href="#" onclick="loadProfile()">Profile</a></li>
                    <li><a href="#">Reservations</a></li>
                    <li><a href="#" onclick="ShowCustomerList()">Customers</a></li>
                    <li><a href="contact_form.php">Contact Form</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content" id="main">
            <section class="content" id="content">
                <div class="card">
                    <h3>Number of Reservations</h3> 
                    <p>125</p>
                </div>
                <div class="card">
                    <h3>Users</h3>
                    <p>34</p>
                </div>
            </section>
        </main>
    </div>
</body>
<script>
function loadProfile() {
    const mainContent = document.getElementById('content');
    mainContent.innerHTML = `
        <style>
    
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    }

    .profile-container {
        background-color: bisque;
        padding: 20px;
        width: 500px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        text-align: center;
        margin: 0 50%;
    }

    h1 {
        color: #333;
    }

    .profile-info {
        margin-bottom: 20px 0;
        background-color: bisque;
    }

    .profile-info p {
        font-size: 1.2em;
        margin: 10px 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #password-text {
        border: none;
        background-color: transparent;
        font-size: 16px;
        margin-left: 10px;
        margin-right: 10px;
    }

    button {
        border: none;
        background-color: #333;
        color: #fff;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
    }

    button:hover {
        background-color: #555;
    }

    .edit-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        text-align: center;
        margin: 10px 0;
        width: 100%;
        box-sizing: border-box;
        cursor: pointer;
        text-transform: uppercase;
        transition: background-color 0.3s, transform 0.3s;
    }

    .edit-btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .edit-btn:active {
        background-color: #004494;
        transform: scale(1)
    }
    </style>
        <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <h2>Username</h2>
            <p><strong>Username:</strong>Username </p>
            <p><strong>Email:</strong> johndoe@gmail.com</p>
            <p><strong>Password:</strong> 
                <span id="password-text">******</span>
                <button type="button" id="togglePassword">Show</button>
            </p>
        </div>
        <a href="edit-profile.php" class="edit-btn"><b>Edit Profile</b></a>
        <a href="logout.php"><button type="submit" class="edit-btn"><b>Logout</b></button></a>
    </div>
    `;
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

}

function ShowCustomerList() {
    const mainContent = document.getElementById('content');
    mainContent.innerHTML = `
    <style>

.container {
    margin-top: 20px;
}
.header-container {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-back {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, transform 0.3s;
}

.btn-back:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.btn-back:active {
    background-color: #004494;
    transform: scale(1);
}
.table {
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#upper {
    background: linear-gradient(to right, #00bcd4, #4caf50);
    color: #fff;
    text-align: center;
}
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
  }
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }
  
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  
  .close:hover, .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
.btn-edit {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(to right, #2196f3, #0d47a1);
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: background 0.3s, transform 0.3s;
}
.btn-edit:hover {
    background: linear-gradient(to right, #0d47a1, #2196f3);
    transform: scale(1.05);
}
.btn-edit:active {
    background: linear-gradient(to right, #0d47a1, #2196f3);
    transform: scale(1);
}
.btn-delete {
    background: linear-gradient(to right, #f44336, #d32f2f);
    padding: 10px 13px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: background 0.3s, transform 0.3s;
}
.btn-delete:hover {
    background: linear-gradient(to right, #d32f2f, #f44336);
    transform: scale(1.05);
}
p {
    font-size: 16px;
    color: #333;
    line-height: 1.5;
    margin: 15px 0;
    padding: 10px;
    border-left: 5px solid #007bff;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.btn-edit1 {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, transform 0.3s;
}

.btn-edit1:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.btn-edit1:active {
    background-color: #004494;
    transform: scale(1);
}

    </style>
    <div class="container mt-3">
  <div class="header-container">
    <a href="admin.php" class="btn-back">Back</a>
  <h2>CUSTOMER'S LIST</h2>           
  <table class="table table-striped">
    <thead id="upper">
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>jhon</td>
        <td>jhon@gmail.com</td>
        <td>password</td>
        <td><button type="button" class="btn-edit" onclick="openModal()">EDIT</button></td>
        <td><button type="button" class="btn-delete" onclick="confirmDelete()">DELETE</button></td>
      </tr>
    </tbody>
  </table>
</div>
    `;
}

</script>
</html>
