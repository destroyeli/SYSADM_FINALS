<?php

/*
|--------------------------------------------------------------------------
| FUNCTIONS.PHP
|--------------------------------------------------------------------------
| Helper functions for SYSADM_FINALS
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Sanitize Input
|--------------------------------------------------------------------------
*/

function cleanInput($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}


/*
|--------------------------------------------------------------------------
| Generate Employee Email
|--------------------------------------------------------------------------
|
| Examples:
|
| Juan Cruz
| -> juan.cruz@fun.com
|
| Juan Dela Cruz
| -> juan.delacruz@fun.com
|
| Maria De Leon
| -> maria.deleon@fun.com
|
| Jose Del Rosario
| -> jose.delrosario@fun.com
|
| If duplicate:
|
| juan.cruz2@fun.com
| juan.cruz3@fun.com
|
*/

function generateEmail($conn, $fullName, $ignoreID = 0)
{
    $fullName = strtolower(trim($fullName));

    // Remove multiple spaces
    $fullName = preg_replace('/\s+/', ' ', $fullName);

    $parts = explode(" ", $fullName);

    // First Name
    $first = array_shift($parts);

    // Build Last Name
    $last = "";

    if(count($parts) > 0){

        $last = implode("", $parts);

    }else{

        $last = "employee";

    }

    // Remove special characters
    $first = preg_replace("/[^a-z]/", "", $first);
    $last  = preg_replace("/[^a-z]/", "", $last);

    $base = $first . "." . $last;

    $email = $base . "@fun.com";

    $counter = 2;

    while(true){

        if($ignoreID == 0){

            $stmt = $conn->prepare(

                "SELECT id
                 FROM employees
                 WHERE email=?"

            );

            $stmt->bind_param("s",$email);

        }else{

            $stmt = $conn->prepare(

                "SELECT id
                 FROM employees
                 WHERE email=?
                 AND id<>?"

            );

            $stmt->bind_param("si",$email,$ignoreID);

        }

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 0){

            return $email;

        }

        $email = $base.$counter."@fun.com";

        $counter++;

    }

}


/*
|--------------------------------------------------------------------------
| Generate Employee Password
|--------------------------------------------------------------------------
|
| Random Examples:
|
| Juan@2026
| Juan#IT26
| Juan@Desk26
| Juan#Office26
|
*/

function generatePassword($fullName)
{

    $first = ucfirst(explode(" ",trim($fullName))[0]);

    $formats = [

        $first."@2026",

        $first."#IT26",

        $first."@Desk26",

        $first."#Office26",

        $first."#Work26",

        $first."@Admin26"

    ];

    return $formats[array_rand($formats)];

}


/*
|--------------------------------------------------------------------------
| Hash Password
|--------------------------------------------------------------------------
*/

function hashPassword($password)
{

    return password_hash($password, PASSWORD_DEFAULT);

}


/*
|--------------------------------------------------------------------------
| Generate Employee Initials
|--------------------------------------------------------------------------
|
| Juan Dela Cruz
| -> JC
|
| Angelito Regero
| -> AR
|
*/

function getInitials($name)
{

    $parts = explode(" ", trim($name));

    if(count($parts) == 1){

        return strtoupper(substr($parts[0],0,2));

    }

    $first = strtoupper(substr($parts[0],0,1));

    $last = strtoupper(substr(end($parts),0,1));

    return $first.$last;

}


/*
|--------------------------------------------------------------------------
| Count Active Employees
|--------------------------------------------------------------------------
*/

function totalEmployees($conn)
{

    $result = $conn->query(

        "SELECT COUNT(*) AS total
         FROM employees
         WHERE deleted=0"

    );

    $row = $result->fetch_assoc();

    return $row['total'];

}


/*
|--------------------------------------------------------------------------
| Format Phone Number
|--------------------------------------------------------------------------
|
| 09171234567
| -> 0917 123 4567
|
*/

function formatPhone($number)
{

    $number = preg_replace('/\D/', '', $number);

    if(strlen($number) == 11){

        return substr($number,0,4)." ".
               substr($number,4,3)." ".
               substr($number,7);

    }

    return $number;

}

?>