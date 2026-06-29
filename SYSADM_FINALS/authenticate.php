<?php

session_start();

include "config/database.php";

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE username='$username'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){

$admin = mysqli_fetch_assoc($result);

if(password_verify($password,$admin['password'])){

$_SESSION['admin']=$admin['username'];

header("Location: dashboard.php");

exit();

}

}

header("Location: login.php?error=1");

?>