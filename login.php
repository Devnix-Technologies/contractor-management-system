<?php
include 'config.php';

$error = "";
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)){
        $_SESSION['admin'] = $u;
        header("Location:index.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="login-body">

<div class="login-wrapper">
  <div class="login-card">
    <h5 class="mb-1">Contractor Management System</h5>
    <p class="text-muted mb-4">Administrator Login</p>

    <?php if($error): ?>
      <div class="alert alert-danger py-2"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>

      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button name="login" class="btn btn-primary w-100 py-2">
        <i class="bi bi-box-arrow-in-right"></i> Login
      </button>
    </form>
  </div>
</div>

</body>
</html>
