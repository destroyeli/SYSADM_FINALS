<?php

include "includes/auth.php";
include "config/database.php";

$sql = "SELECT *
        FROM employees
        WHERE deleted = 0
        ORDER BY employee_name ASC";

$result = $conn->query($sql);

$totalEmployees = $result->num_rows;

include "includes/header.php";
include "includes/sidebar.php";

?>

<div class="topbar">

    <div>

        <h2>Manage Employees</h2>

        <p class="text-muted">

            Total Employees:
            <strong><?php echo $totalEmployees; ?></strong>

        </p>

    </div>

    <a href="add_employee.php" class="btn btn-success">

        <i class="bi bi-person-plus-fill"></i>

        Add Employee

    </a>

</div>

<div class="card">

<div class="card-body">

<div class="row mb-3">

<div class="col-md-6">

<input

type="text"

id="searchInput"

class="form-control"

placeholder="Search employee...">

</div>

</div>

<div class="table-responsive">

<table

class="table table-striped table-hover align-middle"

id="employeeTable">

<thead class="table-success">

<tr>

<th width="70">

ID

</th>

<th>

Employee

</th>

<th>

Email

</th>

<th>

Password

</th>

<th>

Phone

</th>

<th width="220">

Actions

</th>

</tr>

</thead>

<tbody>

<?php

if($totalEmployees > 0){

while($row = $result->fetch_assoc()){

?>

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<div class="d-flex align-items-center">

<div

class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center me-3"

style="width:45px;height:45px;">

<?php

$nameParts = explode(" ", $row['employee_name']);

$initials = strtoupper(substr($nameParts[0],0,1));

if(count($nameParts) > 1){

$initials .= strtoupper(substr(end($nameParts),0,1));

}

echo $initials;

?>

</div>

<div>

<strong>

<?php echo htmlspecialchars($row['employee_name']); ?>

</strong>

</div>

</div>

</td>

<td>

<?php echo htmlspecialchars($row['email']); ?>

</td>

<td>

<span id="pw<?php echo $row['id']; ?>">

••••••••••

</span>

<button

class="btn btn-sm btn-outline-primary ms-2"

onclick="togglePassword(

'pw<?php echo $row['id']; ?>',

'<?php echo htmlspecialchars($row['password_plain'],ENT_QUOTES); ?>'

)">

Show

</button>

</td>

<td>

<?php echo htmlspecialchars($row['phone_number']); ?>

</td>

<td>

<a

href="edit_employee.php?id=<?php echo $row['id']; ?>"

class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

Edit

</a>

<button

class="btn btn-danger btn-sm"

onclick="confirmDelete(

<?php echo $row['id']; ?>,

'<?php echo htmlspecialchars($row['employee_name'],ENT_QUOTES); ?>'

)">

<i class="bi bi-trash"></i>

Delete

</button>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="6" class="text-center">

No Employees Found.

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

<!-- Delete Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header bg-danger text-white">

<h5 class="modal-title">

Delete Employee

</h5>

<button

type="button"

class="btn-close btn-close-white"

data-bs-dismiss="modal">

</button>

</div>

<div class="modal-body">

Are you sure you want to delete

<strong id="employeeName"></strong>

?

</div>

<div class="modal-footer">

<button

class="btn btn-secondary"

data-bs-dismiss="modal">

Cancel

</button>

<a

href="#"

id="deleteLink"

class="btn btn-danger">

Delete

</a>

</div>

</div>

</div>

</div>

<script>

const searchInput=document.getElementById("searchInput");

searchInput.addEventListener("keyup",function(){

let filter=this.value.toLowerCase();

let rows=document.querySelectorAll("#employeeTable tbody tr");

rows.forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(filter)

? ""

: "none";

});

});

function togglePassword(id,password){

let field=document.getElementById(id);

if(field.innerHTML==="••••••••••"){

field.innerHTML=password;

}else{

field.innerHTML="••••••••••";

}

}

function confirmDelete(id,name){

document.getElementById("employeeName").innerHTML=name;

document.getElementById("deleteLink").href="delete_employee.php?id="+id;

let modal=new bootstrap.Modal(

document.getElementById("deleteModal")

);

modal.show();

}

</script>

<?php

include "includes/footer.php";

?>