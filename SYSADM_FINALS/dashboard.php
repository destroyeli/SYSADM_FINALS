<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location: login.php");
exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

<style>

body{

font-family:Arial;
background:#f4f6f9;

}

.header{

background:#0f766e;
padding:20px;
color:white;
display:flex;
justify-content:space-between;
align-items:center;

}

.content{

padding:30px;

}

a{

color:white;
text-decoration:none;

}

</style>

</head>

<body>

<div class="header">

<h2>Employee Management System</h2>

<div>

Welcome,
<?php echo $_SESSION['admin']; ?>

|

<a href="logout.php">

Logout

</a>

</div>

</div>

<div class="content">

<?php include "index.php"; ?>

</div>

</body>

</html>