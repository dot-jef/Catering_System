<?php
include 'db.php';

// Handle deletion if ID is provided
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM contact_form WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Deletion successful
        header("Location: contact_form.php"); // Redirect to avoid form resubmission
        exit();
    } else {
        // Deletion failed
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submissions</title>
    <link rel="stylesheet" href="Contact_form.css">
</head>
<body>
    <div class="header-container">
        <a href="admin.php" class="btn-back">Back</a>
        <h1>Contact Form Submissions</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch contact form submissions
                $sql = "SELECT * FROM contact_form";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        echo "<tr>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['message']) . "</td>
                            <td>
                                <button type='button' class='btn-delete' onclick='confirmDelete($id)'>DELETE</button>
                            </td>
                        </tr>";
                    }
                } else {
                    // No records found
                    echo "<tr><td colspan='4'>No messages found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this item?")) {
            // Create a form dynamically
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'contact_form.php';

            // Create a hidden input for the ID
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'id';
            input.value = id;
            form.appendChild(input);

            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    }
    </script>
</body>
</html>
