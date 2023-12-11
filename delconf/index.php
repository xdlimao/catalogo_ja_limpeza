<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("../static/php/verification.php");
include("../static/php/mysqlconnection.php");
include("../static/php/urls.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../static/css/delconf.css" rel="stylesheet">
    <title>Deletar?</title>
</head>

<body>

    <div class="container text-center">
        <div class="mb-3">
            <?php
            echo "<h1>Deseja deletar o produto " . $_GET["name"] . "?</h1>";
            ?>
        </div>
        <div class="mb-3">
            <form action="index.php" method="get">
                <button type="submit" class="btn btn-danger" name="send" value="send">Deletar</button>&nbsp;&nbsp;<a href="../admpage/"><button type="button" class="btn btn-primary">Cancelar</button></a>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_GET["send"])) {

    mysqli_query($conn, $_SESSION["commanddeltemp"]);
    header("Location: ../admpage/"); //não conseguir usar a url
    $_SESSION["commanddeltemp"] = null;
    exit();
}

$_SESSION["commanddeltemp"] = "DELETE FROM produto WHERE id = '" . $_GET["id"] . "';";
?>