<?php
include("mysqlconnection.php");
include("urls.php");

//https://stackoverflow.com/questions/8923114/how-to-reset-auto-increment-in-mysql

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameprod = $_POST["name"];
    $priceprod = $_POST["price"];

   function returntopage($url_admpage){
        echo "<h1>Erro: Não insira valores nulos!</h1>";
        echo "<a href=".$url_admpage."><h1>Voltar</h1></a>";
   }

    if (empty($nameprod)) {
        returntoPage($url_admpage);
    } elseif (empty($priceprod)){
        returntoPage($url_admpage);
    } else {

        $sql = "INSERT INTO `produto` (`name`, `price`) VALUES ('{$nameprod}', '{$priceprod}')";

        mysqli_query($conn, $sql);

        header("Location: {$url_admpage}");
    }
}
