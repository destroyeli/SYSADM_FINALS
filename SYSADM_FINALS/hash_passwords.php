<?php
include "config/database.php";

$result = mysqli_query($conn, "SELECT id, password_plain FROM employees");

while ($row = mysqli_fetch_assoc($result)) {

    $hash = password_hash($row['password_plain'], PASSWORD_DEFAULT);

    mysqli_query($conn,
        "UPDATE employees
         SET password_hash='$hash'
         WHERE id=".$row['id']);
}

echo "Passwords successfully hashed!";
?>