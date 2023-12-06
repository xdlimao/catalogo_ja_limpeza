<?php
$ip = "localhost";
$user = "root";
$password = "";
$db_name = "db_jalimpeza";

try{
    $conn = mysqli_connect($ip, $user, $password, $db_name);
}catch(mysqli_sql_exception){
    echo "Erro de conexão ao banco de dados <br> Veja se o Banco de dados está operacional";
}

?>