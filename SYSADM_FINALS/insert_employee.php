<?php

include "includes/auth.php";
include "config/database.php";
include "functions.php";

$name = trim($_POST['employee_name']);
$phone = trim($_POST['phone_number']);

$email = generateEmail($conn,$name);

$passwordPlain = generatePassword($name);

$passwordHash = password_hash($passwordPlain,PASSWORD_DEFAULT);
$digits = preg_replace('/\D/', '', $_POST['phone_number']);

if(!preg_match('/^09\d{9}$/', $digits)){

    die("Invalid Philippine mobile number.");

}

$phone = substr($digits,0,4)." ".
         substr($digits,4,3)." ".
         substr($digits,7,4);
$stmt = $conn->prepare(
"INSERT INTO employees
(employee_name,email,password_plain,password_hash,phone_number)

VALUES(?,?,?,?,?)"

);

$stmt->bind_param(

"sssss",

$name,

$email,

$passwordPlain,

$passwordHash,

$phone

);

$stmt->execute();

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Employee Created</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

background:#edf2f7;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

}

.card{

width:600px;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}

</style>

</head>

<body>

<div class="card">

<div class="card-header bg-success text-white">

Employee Successfully Added

</div>

<div class="card-body">

<div class="alert alert-success">

Employee account has been generated.

</div>

<table class="table">

<tr>

<th>Name</th>

<td><?= htmlspecialchars($name) ?></td>

</tr>

<tr>

<th>Email</th>

<td id="email"><?= htmlspecialchars($email) ?></td>

</tr>

<tr>

<th>Password</th>

<td id="password"><?= htmlspecialchars($passwordPlain) ?></td>

</tr>

<tr>

<th>Phone</th>

<td><?= htmlspecialchars($phone) ?></td>

</tr>

</table>

<div class="mt-4">

<button

class="btn btn-primary"

onclick="copyText('email')">

Copy Email

</button>

<button

class="btn btn-warning"

onclick="copyText('password')">

Copy Password

</button>

<a

href="add_employee.php"

class="btn btn-success">

Add Another

</a>

<a

href="dashboard.php"

class="btn btn-secondary">

Dashboard

</a>

</div>

</div>

</div>

<script>

function copyText(id){

navigator.clipboard.writeText(

document.getElementById(id).innerText

);

alert("Copied!");

}

</script>

</body>

</html>