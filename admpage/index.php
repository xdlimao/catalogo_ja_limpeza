<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../static/php/verification.php");
include("../static/php/mysqlconnection.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../static/css/admpage.css" rel="stylesheet">
    <title>AdmPage</title>
</head>

<body>
    <nav class="navbar fixed-top" id="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Produtos</span>

            <div class="d-flex">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addprod" style="margin-right: 1rem;">Adicionar Produto</button>

                <form class="d-flex" action="../static/php/logoff.php" method="GET">
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="addprod" tabindex="-1" aria-labelledby="addProdutoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProdutoModal">Adicionar produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../static/php/addproduct.php" method="post">
                    <div class="modal-body">
                        <label for="nameprod">Produto (Nome Completo, Ex: Sabão 5L)</label>
                        <input type="text" name="name" id="nameprod">
                        <br>
                        <label for="priceprod">Preço (Entre 0,01 e 9.999.999,99)</label>
                        <input type="number" name="price" id="priceprod" min="0" max="10000000" step=".01">
                        <!--https://stackoverflow.com/questions/34057595/allow-2-decimal-places-in-input-type-number-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h2 style="margin: 1rem;">Lista (A - Z)</h2>
    <div class="container text-center">
        <ul class="list-group list-group-flush">
            <?php
            $sqllist1 = "SELECT * FROM produto ORDER BY name ASC";
            $result = mysqli_query($conn, $sqllist1);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li class='list-group-item'>";

                    //Nome e preço produto
                    echo "<p id='nameprodtxt'>" . $row["name"] . "</p>";
                    echo "ID: ".$row["id"];
                    echo "<p id='priceprodtxt'>R$" . $row["price"] . "</p>";

                    //Forms para deletar
                    echo "<form action='../delconf/index.php' method='get'>";
                    echo "<button type='submit' name='id' value=" . $row["id"] . " class='btn btn-danger'>Deletar</button>";
                    echo "
                    <input type='hidden' name='name' value='" . $row["name"] . "'>
                    </form>"; //hidden é um input vazio que não aparece, muito útil!
                    $_SESSION["commanddeltemp"] = null; //Reiniciando a SESSION para DELETE, e assim evitar possiveis erros.

                    echo "</li>";
                }
            }
            ?>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>