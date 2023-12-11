<?php
include("urls.php");
if ($_SERVER["REQUEST_METHOD"] = "GET") {
    session_start();
    $_SESSION["authenticated"] = null;
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header("Location: {$url_adm}");
}
?>