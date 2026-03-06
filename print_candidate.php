<?php
include 'config.php';
if(!isset($_SESSION['admin'])) header("Location:login.php");

$id=$_GET['id'];
$c=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM candidates WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Candidate Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h4><?= $c['name'] ?></h4>
<p><strong>Age:</strong> <?= $c['age'] ?></p>
<p><strong>Address:</strong> <?= $c['address'] ?></p>

<img src="uploads/<?= $c['photo'] ?>" width="180" class="mb-3">

<p>
<a href="uploads/<?= $c['document'] ?>" target="_blank" class="btn btn-secondary">
Open Document
</a>
<button onclick="window.print()" class="btn btn-primary ms-2">
Print
</button>
</p>

</body>
</html>
