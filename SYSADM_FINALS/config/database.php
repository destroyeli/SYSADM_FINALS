<?php

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| Change these values only if your MySQL configuration is different.
|
*/

$host = "localhost";
$username = "root";
$password = "";
$database = "employee_database";

/*
|--------------------------------------------------------------------------
| Create Connection
|--------------------------------------------------------------------------
*/

$conn = new mysqli($host, $username, $password, $database);

/*
|--------------------------------------------------------------------------
| Check Connection
|--------------------------------------------------------------------------
*/

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

/*
|--------------------------------------------------------------------------
| Set Character Encoding
|--------------------------------------------------------------------------
*/

$conn->set_charset("utf8mb4");

?>