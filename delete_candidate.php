<?php
include 'config.php';
if(!isset($_SESSION['admin'])) header("Location:login.php");

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM candidates WHERE id=$id");
header("Location:index.php");
