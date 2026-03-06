<?php
include 'config.php';
if(!isset($_SESSION['admin'])) header("Location:login.php");

if(isset($_POST['save'])){
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
  $address = $_POST['address'];

  $photo = time().'_'.$_FILES['photo']['name'];
  $doc   = time().'_'.$_FILES['document']['name'];

  move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$photo");
  move_uploaded_file($_FILES['document']['tmp_name'], "uploads/$doc");

  mysqli_query($conn,"INSERT INTO candidates
    (name,contact,age,address,photo,document)
    VALUES ('$name','$contact','$age','$address','$photo','$doc')");

  $_SESSION['toast'] = "Candidate added successfully";

  header("Location:index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Candidate</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/admin.css" rel="stylesheet">
</head>
<body>

<div class="admin-layout">
<aside class="sidebar">
<h5>CONTRACTOR SYSTEM</h5>
<a href="index.php">Dashboard</a>
<a class="active">Add Candidate</a>
<a href="logout.php">Logout</a>
</aside>

<div class="main-content">
<div class="topbar"><strong>Add Candidate</strong></div>

<div class="workspace d-flex justify-content-center">
<div class="table-card p-4" style="max-width:720px;width:100%">

<form method="post" enctype="multipart/form-data" class="row g-3">

<h6 class="text-secondary">Basic Information</h6>

<div class="col-12">
<label class="form-label">Candidate Name</label>
<input name="name" class="form-control" required>
</div>

<div class="col-12">
<label class="form-label">Contact Number</label>
<input name="contact" class="form-control" required>
</div>

<div class="col-md-4">
<label class="form-label">Age</label>
<input type="number" name="age" class="form-control" required>
</div>

<div class="col-12">
<label class="form-label">Address</label>
<textarea name="address" class="form-control" rows="3" required></textarea>
</div>

<h6 class="text-secondary mt-3">Documents</h6>

<div class="col-md-6">
<label class="form-label">Photo</label>
<input type="file" name="photo" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">ID / Work Document</label>
<input type="file" name="document" class="form-control" required>
</div>

<div class="col-12 d-flex justify-content-end gap-2 mt-3">
<a href="index.php" class="btn btn-outline-secondary">Cancel</a>
<button name="save" class="btn btn-primary">Save</button>
</div>

</form>
</div>
</div>
</div>
</div>
</body>
</html>
