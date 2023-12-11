<?php
    session_start(); //sempre vem primeiro para garantir tudo funcionando
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include("../static/php/mysqlconnection.php");
    include("../static/php/urls.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../static/css/loginform.css" rel="stylesheet">
    <title>Adm</title>
</head>

<body>
    
    <div class="container">
			<h1>Login</h1>
		<form action="index.php" method="POST">
			<input type="text" placeholder="username" name="user" class="field">
			<input type="password" placeholder="password" name="password" class="field">
			<input type="submit" value="login" class="btn">
		</form>
	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = "SELECT * FROM login WHERE user = '$user' AND password = '$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $_SESSION["authenticated"] = $verificator;
            echo $_SESSION["authenticated"];
            header("Location: {$url_admpage}");
        }else{
            echo "Credenciais incorretas, burro";
        }
    }

    mysqli_close($conn);
?>