<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../static/php/verification.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../static/css/admpage.css" rel="stylesheet">
    <title>AdmPage</title>
</head>

<body>
    <nav class="navbar" id="navbar">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
