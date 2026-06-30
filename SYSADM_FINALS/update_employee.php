<?php

include "includes/auth.php";
include "config/database.php";
include "functions.php";

$id = intval($_POST['id']);

$name = trim($_POST['employee_name']);

$phone = preg_replace('/\D/', '', $_POST['phone_number']);

if (strlen($phone) == 11) {
    $phone = substr($phone, 0, 4) . " " .
             substr($phone, 4, 3) . " " .
             substr($phone, 7, 4);
}

/*
Generate a new email based on the edited name.
*/

$email = generateEmail($conn,$name);

$stmt = $conn->prepare(

"UPDATE employees

SET

employee_name=?,
email=?,
phone_number=?

WHERE id=?"

);

$stmt->bind_param(

"sssi",

$name,
$email,
$phone,
$id

);

$stmt->execute();

header("Location: employees.php");

exit();

?>