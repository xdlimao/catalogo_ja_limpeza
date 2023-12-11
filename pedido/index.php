<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("../static/php/mysqlconnection.php");
//estou passando no POST a seguinte ordem: Quantidade, Preço, Id e Nome
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
            <?php
            $_SESSION["lastid"] = 1;
            $sql = "SELECT * FROM produto ORDER BY name ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //$row["id"]
                    //$row["name"]
                    //$row["price"]

                    //Essa variavel no session é a que vai falar o ultimo ID criado para conseguir fazer a lógica do finalizar pedido
                    if ($row["id"] >= $_SESSION["lastid"]) {
                        $_SESSION["lastid"] = $row["id"];
                    }
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
                            <input type="hidden" name="' . $row["id"] . 'p" value="' . $row["price"] . '">
                            <input type="hidden" name="' . $row["id"] . 'id" value="' . $row["id"] . '">
                            <input type="checkbox" name="' . $row["id"] . '" value="' . $row["name"] . '" class="btn-check" id="btn-check-outlined' . $row["id"] . '" autocomplete="off">
                            <label class="btn btn-outline-success" for="btn-check-outlined' . $row["id"] . '">Adicionar produto</label><br>
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
</body>

</html>