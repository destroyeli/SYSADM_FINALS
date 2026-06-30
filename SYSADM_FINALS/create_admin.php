<?php

include "config/database.php";

$username = "admin";
$password = password_hash("admin", PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn,
    "INSERT INTO admins(username,password)
     VALUES(?,?)");

mysqli_stmt_bind_param($stmt,"ss",$username,$password);
mysqli_stmt_execute($stmt);

echo "Admin account created successfully.";
?>