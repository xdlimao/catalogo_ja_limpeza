<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/css/finalizar.css">
    <title>Carrinho (Finalizar)</title>
</head>
<body>
<nav class="navbar fixed-top" id="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Carrinho</span>
            <div class="d-flex">
                <a href="../pedido/"><button type="button" class="btn btn-danger">Voltar</button></a>
            </div>
        </div>
    </nav>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo $_POST["8"];
            echo $_POST["8q"];
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>