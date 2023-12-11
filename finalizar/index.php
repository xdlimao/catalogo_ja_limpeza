<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../static/css/finalizar.css" rel="stylesheet">
    <title>Carrinho (Finalizar)</title>
</head>

<body>
    <nav class="navbar fixed-top" id="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Carrinho</span>
            <div class="d-flex">
                <a href="../pedido/"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <br>
        <h2>Este é o pedido? Revise ele antes de enviar.</h2>
        <ul class="list-group">
            <?php
            //Contador para saber se há algum item no carrinho
            $j = 0;

            //Nomeclaturas do server (usando $_POST[$i."x"])
            //$i = nome do produto
            //$iid = id do produto
            //$iq = quantidade do produto
            //$ip = preco do produto
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                for ($i = 0; $i <= $_SESSION["lastid"]; $i++) {
                    if (isset($_POST[$i])) {
                        echo '<li class="list-group-item list-group-item-light">';

                        //Irei dar o id no html igual o ID do db com as siglas
                        $id = $i;
                        echo "<h5 class=" . "d-flex" . ">" .

                            "<p id='" .  $id . "q" . "'>x" . $_POST[$i . "q"] . "</p>"

                            . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .

                            "<p id='" . $id . "'>" . $_POST[$i] . "</p>"

                            . "</h5>";
                        echo "<h5><p id='" . $id . "p" . "'>Preço: R$" . $_POST[$i . "p"] * $_POST[$i . "q"] . "</p></h5>";
                        echo "</li>";
                        $j++;
                    }
                }
                if (empty($j)) {
                    echo '<li class="list-group-item list-group-item-light">';
                    echo "<h5>Carrinho vazio! Escolha algum produto.</h5>";
                    echo "</li>";
                }
            }
            ?>
        </ul>

    </div>
    <br>
    <div class="container text-center" id="addrpr">
        <div class="row">
            <div class="col">
            <div class="input-group mb-3">
                    <span class="input-group-text">Nome*</span>
                    <input type="text" id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Número*</span>
                    <input type="text" id="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Complemento</span>
                    <input type="text" id="complement" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rua*</span>
                    <input type="text" id="street" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Bairro*</span>
                    <input type="text" id="district" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Cidade*</span>
                    <input type="text" id="city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="col">
                <div class="justify-content-center align-items-center">
                    <h3 id="result">Total do pedido: R$0</h3>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <button type="button" class="btn btn-success" id="send" onclick="start()">Enviar</button>
                    <br>
                    <br>
                    <h7>Após clicar em enviar, envie a <br>mensagem gerada no seu WhatsApp.</h7>
                </div>
            </div>
        </div>
        <p style="margin-bottom:-1rem;">Os itens com * são obrigatórios</p>
    </div>
    <?php 
    //Saber qual é o ultimo ID do DB para loops
    echo "<input type='hidden' id='lastid' value='" . $_SESSION["lastid"] . "'>";
    ?>
    
    <script defer src="../static/js/finalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    if (empty($j)) {
        echo '<script>

        elemento = document.getElementById("addrpr");
        elemento.innerHTML = "";
      
        </script>';
    }
    ?>
</body>

</html>