<?php
include 'config.php';
if(!isset($_SESSION['admin'])) header("Location:login.php");

$id = intval($_GET['id']);
$c = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM candidates WHERE id=$id"));

if(isset($_POST['update'])){
  $name    = $_POST['name'];
  $contact = $_POST['contact'];
  $age     = $_POST['age'];
  $address = $_POST['address'];

  mysqli_query($conn,"UPDATE candidates SET
    name='$name',
    contact='$contact',
    age='$age',
    address='$address'
    WHERE id=$id");

  if(!empty($_FILES['photo']['name'])){
    $photo = time().'_'.$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/$photo");
    mysqli_query($conn,"UPDATE candidates SET photo='$photo' WHERE id=$id");
  }

  if(!empty($_FILES['document']['name'])){
    $doc = time().'_'.$_FILES['document']['name'];
    move_uploaded_file($_FILES['document']['tmp_name'],"uploads/$doc");
    mysqli_query($conn,"UPDATE candidates SET document='$doc' WHERE id=$id");
  }

  $_SESSION['toast'] = "Candidate updated successfully";
  header("Location:index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Candidate</title>
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
<a class="active">Edit Candidate</a>
<a href="logout.php">Logout</a>
</aside>

<div class="main-content">
<div class="topbar"><strong>Edit Candidate</strong></div>

<div class="workspace d-flex justify-content-center">
<div class="table-card p-4" style="max-width:720px;width:100%">

<form method="post" enctype="multipart/form-data" class="row g-3">

<div class="col-12">
<label class="form-label">Candidate Name</label>
<input name="name" class="form-control" value="<?= $c['name'] ?>" required>
</div>

<div class="col-12">
<label class="form-label">Contact Number</label>
<input name="contact" class="form-control" value="<?= $c['contact'] ?>" required>
</div>

<div class="col-md-4">
<label class="form-label">Age</label>
<input type="number" name="age" class="form-control" value="<?= $c['age'] ?>" required>
</div>

<div class="col-12">
<label class="form-label">Address</label>
<textarea name="address" class="form-control" rows="3"><?= $c['address'] ?></textarea>
</div>

<h6 class="text-secondary mt-3">Update Documents (optional)</h6>

<div class="col-md-6">
<label class="form-label">Replace Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<div class="col-md-6">
<label class="form-label">Replace Document</label>
<input type="file" name="document" class="form-control">
</div>

<div class="col-12 d-flex justify-content-end gap-2 mt-3">
<a href="index.php" class="btn btn-outline-secondary">Back</a>
<button name="update" class="btn btn-primary">Update</button>
</div>

</form>
</div>
</div>
</div>
</div>
</body>
</html>
