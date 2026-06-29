<?php
include "config/database.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['admin'])){

header("Location: login.php");
exit();

}

include "config/database.php";

$sql = "SELECT * FROM employees";

$result = mysqli_query($conn,$sql);


$sql = "SELECT * FROM employees";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Database</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h1>Employee Database</h1>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Name of Employee</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone Number</th>
            </tr>

        </thead>

        <tbody>

        <?php
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['employee_name']; ?></td>

            <td><?php echo $row['email']; ?></td>

            <td>

                <span id="pw<?php echo $row['id']; ?>">
                    ••••••••••
                </span>

                <button
                onclick="togglePassword(
                'pw<?php echo $row['id']; ?>',
                '<?php echo htmlspecialchars($row['password_plain'], ENT_QUOTES); ?>'
                )">
                Show
                </button>

            </td>

            <td><?php echo $row['phone_number']; ?></td>

        </tr>

        <?php
            }
        }else{
            echo "<tr><td colspan='5'>No Records Found.</td></tr>";
        }
        ?>

        </tbody>

    </table>

</div>
<script>

function togglePassword(id,password){

    let field = document.getElementById(id);

    if(field.innerHTML === "••••••••••"){

        field.innerHTML = password;

    }else{

        field.innerHTML = "••••••••••";

    }

}

</script>
</body>
</html>