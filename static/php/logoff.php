<?php
include("urls.php");
if($_SERVER["REQUEST_METHOD"] = "GET"){
    session_start();
    $_SESSION["authenticated"] = null;
    session_destroy();
    header("Location: {$url_adm}");
}
?>