<?php
session_start();
include('../core/db.php');

if (!isset($_GET['user_id']) && !isset($_GET['contact_id'])) {
    die("Invalid request");
}

$userId = $conn->real_escape_string($_GET['user_id']);
$contactId = $conn->real_escape_string($_GET['contact_id']);

// Delete User Function
if (isset($_GET['user_id'])){
    $deleteUser = "DELETE FROM users WHERE user_id = '$userId'";
    if ($conn->query($deleteUser) === TRUE) {
        header("Location: ../admin/admin.php"); // Redirect back to the reservations page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Contact Function
if (isset($_GET['contact_id'])){
    $deleteContact = "DELETE FROM contact_form WHERE contact_id = '$contactId'";
    if ($conn->query($deleteContact) === TRUE) {
        header("Location: ../admin/admin.php"); // Redirect back to the reservations page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>