<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
|--------------------------------------------------------------------------
| Check Login
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['admin_id'])) {

    header("Location: login.php");
    exit();

}

/*
|--------------------------------------------------------------------------
| Session Timeout (30 minutes)
|--------------------------------------------------------------------------
*/

$timeout = 1800;

if (isset($_SESSION['LAST_ACTIVITY'])) {

    if ((time() - $_SESSION['LAST_ACTIVITY']) > $timeout) {

        session_unset();

        session_destroy();

        header("Location: login.php");

        exit();

    }

}

$_SESSION['LAST_ACTIVITY'] = time();

?>