<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="customer.css">
</head>
<body>

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
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <p>Do you want to edit this profile?</p>
    <a href="editprofile.html" class="btn-edit1">Go to Edit Profile</a>
  </div>
</div>
<script>
function confirmDelete() {
    var result = confirm("Are you sure you want to delete this item?");
    if (result) {
        alert("Item deleted!");
    }
}
function openModal() {
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
window.onclick = function(event) {
    if (event.target == document.getElementById('editModal')) {
        closeModal();
    }
}
</script>

</body>
</html>
