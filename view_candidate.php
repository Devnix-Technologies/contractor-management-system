<?php
include 'config.php';
if(!isset($_SESSION['admin'])) header("Location:login.php");

$id = $_GET['id'];
$c = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM candidates WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
<title>View Candidate</title>
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
  <a class="active">View Candidate</a>
  <a href="logout.php">Logout</a>
</aside>

<div class="main-content">
<div class="topbar"><strong>Candidate Details</strong></div>

<div class="workspace d-flex justify-content-center">
<div class="table-card p-4 text-center" style="max-width:600px;width:100%">

<img src="uploads/<?= $c['photo'] ?>" 
     class="rounded-circle mb-3"
     style="width:120px;height:120px;object-fit:cover">

<h5 class="mb-1"><?= $c['name'] ?></h5>
<p class="text-muted mb-3"><?= $c['contact'] ?></p>

<hr>

<div class="text-start small">
<p><b>Age:</b> <?= $c['age'] ?></p>
<p><b>Address:</b> <?= $c['address'] ?></p>
</div>

<div class="d-flex justify-content-center gap-2 mt-3">
<a href="uploads/<?= $c['document'] ?>" target="_blank"
   class="btn btn-sm btn-outline-primary">
<i class="bi bi-file-earmark"></i> View Document
</a>

<button onclick="window.print()" class="btn btn-sm btn-outline-secondary">
<i class="bi bi-printer"></i> Print
</button>

<a href="index.php" class="btn btn-sm btn-outline-dark">
<i class="bi bi-arrow-left"></i> Back
</a>
</div>

</div>
</div>
</div>
</div>
</body>
</html>
