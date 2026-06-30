<?php

include "includes/auth.php";
include "config/database.php";

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM employees WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows==0){

    header("Location: employees.php");
    exit();

}

$employee = $result->fetch_assoc();

include "includes/header.php";
include "includes/sidebar.php";

?>

<div class="topbar">

<h2>Edit Employee</h2>

<a href="employees.php" class="btn btn-secondary">

Back

</a>

</div>

<div class="card">

<div class="card-body">

<form action="update_employee.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $employee['id']; ?>">

<div class="mb-3">

<label class="form-label">

Employee Name

</label>

<input

type="text"

name="employee_name"

class="form-control"

value="<?= htmlspecialchars($employee['employee_name']); ?>"

required>

</div>

<input

type="text"

id="phone"

name="phone_number"

class="form-control"

value="<?= htmlspecialchars($employee['phone_number']); ?>"

maxlength="13"

required>

<button class="btn btn-success">

Update Employee

</button>

<a
href="employees.php"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

<?php include "includes/footer.php"; ?>