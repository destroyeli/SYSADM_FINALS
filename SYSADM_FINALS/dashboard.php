<?php

include "includes/auth.php";
include "config/database.php";

$totalEmployees = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM employees WHERE deleted=0"));

include "includes/header.php";
include "includes/sidebar.php";

?>

<div class="topbar">

<h2>

Dashboard

</h2>

<div>

Welcome,

<span class="username">

<?php echo htmlspecialchars($_SESSION['username']); ?>

</span>

</div>

</div>

<div class="row">

<div class="col-md-4">

<div class="card dashboard-card">

<div class="dashboard-icon">

<i class="bi bi-people-fill"></i>

</div>

<h5>Total Employees</h5>

<h2>

<?php echo $totalEmployees; ?>

</h2>

</div>

</div>

<div class="col-md-4">

<a href="add_employee.php"
class="text-decoration-none text-dark">

<div class="card dashboard-card">

<div class="dashboard-icon">

<i class="bi bi-person-plus-fill"></i>

</div>

<h5>Add Employee</h5>

</div>

</a>

</div>

<div class="col-md-4">

<a href="employees.php"
class="text-decoration-none text-dark">

<div class="card dashboard-card">

<div class="dashboard-icon">

<i class="bi bi-table"></i>

</div>

<h5>Manage Employees</h5>

</div>

</a>

</div>

</div>

<?php

include "includes/footer.php";

?>