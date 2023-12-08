<!DOCTYPE html>
<html lang="en">
<?php
include("../static/php/mysqlconnection.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/css/pedido.css">
    <title>Pedido</title>
</head>

<body>
    <nav class="navbar fixed-top" id="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Produtos</span>
            <div class="d-flex">
                <a href="../finalizar/"><button type="button" class="btn btn-success">Ver carrinho</button></a>
            </div>
        </div>
    </nav>

    <div>
        <?php
        $sqllist1 = "SELECT * FROM produto ORDER BY name ASC";
        $result = mysqli_query($conn, $sqllist1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p id='nameprodtxt'>" . $row["name"] . "</p>";
                echo "<p id='priceprodtxt'>R$" . $row["price"] . "</p>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>