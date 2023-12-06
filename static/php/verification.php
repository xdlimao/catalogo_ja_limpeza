<?php    
    //definir session start no inicio das páginas php (no inicio mesmo, até antes de outros códigos)
    include("../static/php/urls.php");

    echo $_SESSION["authenticated"];

    if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != $verificator){
        header("Location: {$url_adm}");
    }
?>