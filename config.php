<?php
session_start();

$conn = mysqli_connect("localhost","root","","candidate_system");

if(!$conn){
  die("Database connection failed");
}
