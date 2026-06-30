<?php

include "includes/auth.php";
include "config/database.php";

$id = intval($_GET['id']);

$stmt = $conn->prepare(

"UPDATE employees

SET deleted=0

WHERE id=?"

);

$stmt->bind_param("i",$id);

$stmt->execute();

header("Location: employees.php");

exit();

?>