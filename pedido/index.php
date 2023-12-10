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
    <form action="../finalizar/" method="post">
        <nav class="navbar fixed-top" id="navbar">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Produtos</span>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success">Ver carrinho</button>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    &nbsp;
                </div>
                <div class="card-body">
                    <h5 class="card-title">Sabão Líquido 5L</h5>
                    <p class="card-text">R$22,00</p>

                    <div class="text-center">
                        <label for="numberinput"><i>Quantidade: &nbsp;</i></label>
                        <input type="number" name="" id="numberinput" value="1" min="1" step="1" style="width: 4rem; margin-right:3rem;" required>

                        <input type="checkbox" name="" value="" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-success" for="btn-check-outlined">Adicionar produto</label><br>

                        <!--<a href="#" class="btn btn-primary">Botão 1</a>-->
                    </div>

                </div>
            </div>
            <br>
            <?php
            $sql = "SELECT * FROM produto ORDER BY name ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //$row["id"]
                    //$row["name"]
                    //$row["price"]

                    echo '
                <div class="card">
                    <div class="card-header">
                        &nbsp;
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">' . $row["name"] . '</h5>
                        <p class="card-text">R$' . $row["price"] . '</p>
        
                        <div class="text-center">
                            <label for="numberinput"><i>Quantidade: &nbsp;</i></label>
                            <input type="number" name="' . $row["id"] . 'q" id="numberinput" value="1" min="1" step="1" style="width: 4rem; margin-right:3rem;" required>
        
                            <input type="checkbox" name="' . $row["id"] . '" value="' . $row["name"] . '" class="btn-check" id="btn-check-outlined' . $row["id"] . '" autocomplete="off">
                            <label class="btn btn-outline-success" for="btn-check-outlined' . $row["id"] . '">Adicionar produto</label><br>
        
                            <!--<a href="#" class="btn btn-primary">Botão 1</a>-->
                        </div>
        
                    </div>
                </div>
                <br>';
                }
            }
            ?>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../static/js/numbersincrementer.js"></script>
</body>

</html>