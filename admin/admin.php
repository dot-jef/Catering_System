<?php
  session_start();
  include('../core/db.php');

  if (!isset($_SESSION['username'])){
    header('Location: ../homepage.php');
    exit();
  } else {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // if the logged user is a user, redirect to user homepage
    if ($row['role'] == 'user'){
        header('Location: ../user/userhp.php');
    }
  }

  $id = $_SESSION['id'];
  $email = $_SESSION['email'];

  $getreserves = "SELECT * FROM catering_form";
  $result_reserves = $conn->query($getreserves);
  $count_reserves = $result_reserves->num_rows;

  $getusers = "SELECT * FROM users WHERE role = 'user'";
  $result_users = $conn->query($getusers);
  $count_users = $result_users->num_rows;

  $getcontacts = "SELECT * FROM contact_form";
  $result_contacts = $conn->query($getcontacts);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Service Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css\bootstrap.min.css">
</head>
<body>
    <div class="sidebar p-2">
        <h2 class="text-center">FNOF ADMIN</h2>
        <button class="tablink" onclick="openPage('Profile', this)">Profile</button>
        <button class="tablink" onclick="openPage('Reservations', this)">Reservations</button>
        <button class="tablink" onclick="openPage('Customers', this)">Users</button>
        <button class="tablink" onclick="openPage('ContactForm', this)">Contact Form</button>
    </div>

    <div class="content col-10">
        <!-- Default Content -->
        <div id="defaultContent">
            <div class="card">
                <h3>Reservations</h3>
                <p><?php echo $count_reserves?></p>
            </div>
            <div class="card">
                <h3>Users</h3>
                <p><?php echo $count_users?></p>
            </div>
            <!--<div class="card">
                <h3>Contact Form</h3>
                <p>View the contact form submissions.</p>
            </div>-->
        </div>

        <!-- Individual Content Sections -->

                       <!-- PROFILE -->

        <div id="Profile" class="tabcontent">     
            <div class="profile-container">
                <h1>Profile</h1>
                <div class="profile-info">
                    <p><strong>ID:</strong><?php echo " ".$id;?></p>
                    <p><strong>Username:</strong><?php echo " ".$username;?></p>    
                    <p><strong>Email:</strong><?php echo " ".$email;?></p>
                </div>
                <a href="../edit-profile.php" class="edit-btn">Edit Profile</a>
                <a href="../functions/logout.php"><button type="submit" class="edit-btn"><b>Logout</b></button></a>            
            </div>
        </div>


                          <!-- RESERVATIONS -->

        <div id="Reservations" class="tabcontent" style="display:none">
            <div class="header-container">
                <h2>RESERVATION'S LIST</h2> 
                </div>
                  <div class="container mt-3">          
                <table class="table table-striped">
                  <thead id="upper">
                    <tr>
                      <th>Ref no.</th>
                      <th>User ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Full Name</th>
                      <th>Phone no.</th>
                      <th>Location</th>
                      <th>Date/Time</th>
                      <th>Occasion</th>
                      <th>E-Package</th>
                      <th>F-Package</th>
                      <th>Comment</th>
                      <th>Status</th>
                      <th class="text-center" colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($row_contacts = $result_reserves->fetch_array()){
                            $refNo = htmlspecialchars($row_contacts['ref_no']);
                            echo "<tr>
                                <td>".$row_contacts['ref_no']."</td>
                                <td>".$row_contacts['user_id']."</td>
                                <td>".$row_contacts['username']."</td>
                                <td>".$row_contacts['email']."</td>
                                <td>".$row_contacts['full_name']."</td>
                                <td>".$row_contacts['phone_number']."</td>
                                <td>".$row_contacts['location']." ,Landmark: ".$row_contacts['landmark']."</td>
                                <td>".$row_contacts['date_time']."</td>
                                <td>".$row_contacts['occasion']."</td>
                                <td>".$row_contacts['equipment_pack']."</td>
                                <td>".$row_contacts['food_pack']."</td>
                                <td>".$row_contacts['comment']."</td>
                                <td>".$row_contacts['status']."</td>";
                                if ($row_contacts['status'] == 'Pending'){
                                  echo "<td><button type='button' class='btn-approve' onclick='confirmApprove(\"$refNo\")'>Approve</button>
                                  <button type='button' class='btn-decline' onclick='confirmDecline(\"$refNo\")'>Decline</button>
                                  <button type='button' class='btn-decline' onclick='confirmDelete(\"$refNo\")'>Delete</button></td>
                              </tr>";
                                } else {
                                  echo "<td>
                                  <button type='button' class='btn-decline' onclick='confirmDelete(\"$refNo\")'>Delete</button></td>
                              </tr>";
                                }
                        }
                    ?>
                      <!-- <td><button type="button" class="btn-edit" onclick="openModal()">EDIT</button></td>
                      <td><button type="button" class="btn-delete" onclick="confirmDelete()">DELETE</button></td> -->
                  </tbody>
                </table>
              </div>
          </div>

                            <!-- USERS -->


          <div id="Customers" class="tabcontent" style="display:none">
            <div class="header-container">
                <h2>USER'S LIST</h2> 
                </div>
                  <div class="container mt-3">          
                <table class="table table-striped">
                  <thead id="upper">
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($row_contacts = $result_users->fetch_array()){
                            $userId = htmlspecialchars($row_contacts['id']);
                            echo "<tr>
                                <td>".$row_contacts['id']."</td>
                                <td>".$row_contacts['username']."</td>
                                <td>".$row_contacts['email']."</td>
                                <td><button type='button' class='btn-delete' onclick='confirmDeleteUser(\"$userId\")'>Delete</button></td>
                            </tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
        </div>


                          <!-- CONTACTS -->

        <div id="ContactForm" class="tabcontent" style="display:none">
            <div class="header-container">
                <h2>CONTACT FORM</h2> 
                </div>
                  <div class="container mt-3">          
                <table class="table table-striped">
                  <thead id="upper">
                    <tr>
                      <th>ID</th>
                      <th>User ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($row_contacts = $result_contacts->fetch_array()){
                            $contactId = htmlspecialchars($row_contacts['contact_id']);
                            echo "<tr>
                                <td>".$row_contacts['contact_id']."</td>
                                <td>".$row_contacts['user_id']."</td>
                                <td>".$row_contacts['user_username']."</td>
                                <td>".$row_contacts['user_email']."</td>
                                <td>".$row_contacts['message']."</td>
                                <td><button type='button' class='btn-delete' onclick='confirmDeleteContact(\"$contactId\")'>Delete</button></td>
                            </tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
        </div>      
    <script>
        function openPage(pageName, element) {
    var i, tabcontent, tablinks, defaultContent;
    tabcontent = document.getElementsByClassName("tabcontent");
    defaultContent = document.getElementById("defaultContent");

    // Hide all tab contents
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Hide default content
    defaultContent.style.display = "none";

    // Show the clicked tab content
    document.getElementById(pageName).style.display = "block";

    // Reset background color of all tab links
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Set background color of clicked tab
    element.style.backgroundColor = '#444';
}

function confirmApprove(refNo) {
    var result = confirm("Are you sure you want to approve of this reservation?");
    if (result) {
        // Redirect to a PHP script to handle the deletion
        window.location.href = '../functions/approve_reservation.php?ref_no=' + encodeURIComponent(refNo);
    }
}

function confirmDecline(refNo) {
    var result = confirm("Are you sure you want to decline this reservation?");
    if (result) {
        // Redirect to a PHP script to handle the deletion
        window.location.href = '../functions/decline_reservation.php?ref_no=' + encodeURIComponent(refNo);
    }
}

function confirmDelete(refNo) {
    var result = confirm("Are you sure you want to delete this reservation?");
    if (result) {
        // Redirect to a PHP script to handle the deletion
        window.location.href = '../functions/delete_reservation.php?ref_no=' + encodeURIComponent(refNo);
    }
}

function confirmDeleteUser(id) {
    var result = confirm("Are you sure you want to delete this user account?");
    if (result) {
        // Redirect to a PHP script to handle the deletion
        window.location.href = '../functions/delete_userORcontact.php?user_id=' + encodeURIComponent(id);
    }
}

function confirmDeleteContact(id) {
    var result = confirm("Are you sure you want to delete this contact form?");
    if (result) {
        // Redirect to a PHP script to handle the deletion
        window.location.href = '../functions/delete_userORcontact.php?contact_id=' + encodeURIComponent(id);
    }
}

    </script>
</body>
</html>
