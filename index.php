<?php
include 'config.php';
if(!isset($_SESSION['admin'])) header("Location:login.php");
$r = mysqli_query($conn,"SELECT * FROM candidates ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/admin.css" rel="stylesheet">
<script src="assets/js/script.js" defer></script>
</head>
<body>

<div class="admin-layout">
<aside class="sidebar">
  <h5>CONTRACTOR SYSTEM</h5>
  <a class="active">Dashboard</a>
  <a href="add_candidate.php">Add Candidate</a>
  <a href="logout.php">Logout</a>
</aside>

<div class="main-content">
<div class="topbar"><strong>Candidate List</strong></div>

<div class="workspace">
<input id="search" class="form-control mb-3" placeholder="Search candidate">

<div class="table-card">
<table class="table table-hover">
<thead>
<tr>
  <th>Name</th>
  <th>Contact</th>
  <th>Age</th>
  <th width="220">Actions</th>
</tr>
</thead>
<tbody id="table">

<?php if(mysqli_num_rows($r)==0){ ?>
<tr>
<td colspan="4" class="text-center text-muted py-4">No candidates found</td>
</tr>
<?php } ?>

<?php while($row=mysqli_fetch_assoc($r)){ ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['contact'] ?></td>
<td><?= $row['age'] ?></td>
<td>
<a href="view_candidate.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">View</a>
<a href="edit_candidate.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
<a href="delete_candidate.php?id=<?= $row['id'] ?>" 
   onclick="return confirm('Delete this candidate?')" 
   class="btn btn-sm btn-outline-danger">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>

<?php if(isset($_SESSION['toast'])){ ?>
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:9999">
  <div class="toast show text-bg-success border-0">
    <div class="d-flex">
      <div class="toast-body">
        <?= $_SESSION['toast'] ?>
      </div>
      <button class="btn-close btn-close-white me-2 m-auto"
        onclick="this.closest('.toast').remove()"></button>
    </div>
  </div>
</div>
<?php unset($_SESSION['toast']); } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
