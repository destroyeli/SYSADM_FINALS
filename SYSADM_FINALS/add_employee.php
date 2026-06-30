<?php

include "includes/auth.php";

include "includes/header.php";

include "includes/sidebar.php";

?>

<div class="topbar">

<h2>Add Employee</h2>

<a href="dashboard.php" class="btn btn-secondary">

Back

</a>

</div>

<div class="card">

<div class="card-body">

<form action="insert_employee.php" method="POST">

<div class="mb-3">

<label class="form-label">

Employee Name

</label>

<input

type="text"

class="form-control"

name="employee_name"

placeholder="Enter Employee Name"

required>

</div>

<div class="mb-3">

    <label class="form-label">

        Phone Number

    </label>

    <input

        type="text"

        id="phone"

        name="phone_number"

        class="form-control"

        placeholder="0912 345 6789"

        maxlength="13"

        required>

</div>

<button

class="btn btn-success">

Generate Employee

</button>

</form>

</div>

</div>

<?php

include "includes/footer.php";

?>