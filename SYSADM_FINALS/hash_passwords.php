<?php

include "config/database.php";

$result = mysqli_query($conn, "SELECT id, password_plain FROM employees");

while($row = mysqli_fetch_assoc($result))
{
    $hash = password_hash($row['password_plain'], PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn,
        "UPDATE employees
         SET password_hash=?
         WHERE id=?");

    mysqli_stmt_bind_param($stmt,"si",$hash,$row['id']);
    mysqli_stmt_execute($stmt);
}

echo "Employee passwords hashed successfully.";
?>