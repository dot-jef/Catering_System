<?php
session_start();
include('../core/db.php');

// Check if the user is logged in and the ref_no is provided
if (!isset($_SESSION['id']) || !isset($_GET['ref_no'])) {
    die("Invalid request");
}

$userID = $_SESSION['id'];
$refNo = $conn->real_escape_string($_GET['ref_no']);

// Prepare the SQL statement to delete the reservation
$sql = "DELETE FROM catering_form WHERE user_id = '$userID' AND ref_no = '$refNo'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../user/my_reservations.php"); // Redirect back to the reservations page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>