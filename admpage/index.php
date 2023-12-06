<!DOCTYPE html>
<html lang="en">
<?php
    session_start();    
    include("../static/php/verification.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdmPage</title>
</head>
<body>
    <form action="../static/php/logoff.php" method="GET">
        <input type="submit" value="Log off">
    </form>
</body>
</html>