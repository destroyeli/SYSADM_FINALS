<?php

session_start();

if (isset($_SESSION['admin_id'])) {

    header("Location: dashboard.php");

    exit();

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>SYSADM Finals Login</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{

background:#f4f6f9;

height:100vh;

display:flex;

justify-content:center;

align-items:center;

}

.card{

width:420px;

border:none;

border-radius:15px;

box-shadow:0 10px 30px rgba(0,0,0,.15);

}

.logo{

font-size:60px;

}

</style>

</head>

<body>

<div class="card">

<div class="card-body p-5">

<div class="text-center mb-3">

<div class="logo">

👨‍💼

</div>

<h3>

Employee Management System

</h3>

<p class="text-muted">

Administrator Login

</p>

</div>

<?php

if(isset($_GET['error'])){

?>

<div class="alert alert-danger">

Invalid Username or Password.

</div>

<?php

}

?>

<form action="authenticate.php" method="POST">

<div class="mb-3">

<label>

Username

</label>

<input

type="text"

name="username"

class="form-control"

required>

</div>

<div class="mb-4">

<label>

Password

</label>

<input

type="password"

name="password"

class="form-control"

required>

</div>

<button

class="btn btn-success w-100">

Login

</button>

</form>

</div>

</div>

</body>

</html>