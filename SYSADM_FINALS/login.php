<?php
session_start();

if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/style.css">

<style>

body{

display:flex;
justify-content:center;
align-items:center;
height:100vh;
background:#f2f2f2;

}

.login-box{

width:350px;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 20px rgba(0,0,0,.2);

}

.login-box h2{

text-align:center;
margin-bottom:25px;

}

input{

width:100%;
padding:12px;
margin-bottom:15px;
font-size:16px;

}

button{

width:100%;
padding:12px;
background:#0f766e;
color:white;
border:none;
cursor:pointer;
font-size:16px;

}

button:hover{

background:#115e59;

}

.error{

color:red;
text-align:center;
margin-bottom:15px;

}

</style>

</head>

<body>

<div class="login-box">

<h2>Administrator Login</h2>

<?php

if(isset($_GET['error'])){

echo "<p class='error'>Invalid Username or Password</p>";

}

?>

<form action="authenticate.php" method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit">

Login

</button>

</form>

</div>

</body>

</html>