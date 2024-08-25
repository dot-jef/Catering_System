<?php
  session_start();
  include('../core/db.php');

  $userID = $_SESSION['id'];

  $getreserves = "SELECT * FROM catering_form WHERE user_id = '$userID'";
  $result = $conn->query($getreserves);
  $count = $result->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Reservations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/reservations.css">
</head>
<body>

<a href="#" onclick="history.go(-1)" class="btn-back">Back</a>

<div class="container mt-3">
  <h2><strong>MY RESERVATIONS</strong></h2>     
  <div class="header-container">
        
  <table class="table table-striped">
    <thead id="upper">
      <tr>
        <th>REF NO</th>
        <th>Location</th>
        <th>Date/Time</th>
        <th>Occasion</th>
        <th>Equipment</th>
        <th>Food</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = $result->fetch_array()){
          $refNo = htmlspecialchars($row['ref_no']);
          echo "<tr>
            <td>".$row['ref_no']."</td>
            <td>".$row['location']."</td>
            <td>".$row['date_time']."</td>
            <td>".$row['occasion']."</td>
            <td>".$row['equipment_pack']."</td>
            <td>".$row['food_pack']."</td>
            <td>".$row['status']."</td>
            <td><button type='button' class='btn-delete' onclick='confirmDelete(\"$refNo\")'>Cancel</button></td>
          </tr>";
        }
      ?>
    </tbody>
  </table>
</div>
<script>
function confirmDelete(refNo) {
    var result = confirm("Are you sure you want to cancel this reservation?");
    if (result) {
        // Redirect to a PHP script to handle the deletion
        window.location.href = '../functions/cancel_reservation.php?ref_no=' + encodeURIComponent(refNo);
    }
}
</script>

</body>
</html>
