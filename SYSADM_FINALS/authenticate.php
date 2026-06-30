<?php

session_start();

include "config/database.php";

$username = trim($_POST['username']);
$password = $_POST['password'];

$stmt = $conn->prepare(

"SELECT id,username,password

FROM admins

WHERE username=?"

);

$stmt->bind_param("s",$username);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows==1){

$admin = $result->fetch_assoc();

if(password_verify($password,$admin['password'])){

session_regenerate_id(true);

$_SESSION['admin_id']=$admin['id'];

$_SESSION['username']=$admin['username'];

$_SESSION['LAST_ACTIVITY']=time();

header("Location: dashboard.php");

exit();

}

}

header("Location: login.php?error=1");

exit();

?>