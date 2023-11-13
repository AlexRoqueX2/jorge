<?php
$servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'card';    
    $conn = new mysqli($servername, $username, $password,$dbname);

    if( $conn->connect_error ) {
        die('Falha ao conectar a db'. $conn->connect_error);
    }else{
        echo "conexão";
    }

    $_SESSION["nome"] = $_POST["usuário"];
    $_SESSION["senha"] = $_POST["senha"];

    echo $_SESSION["nome"];
    echo $_SESSION["senha"];

    $nominho = $_SESSION["nome"];
    $senha = $_SESSION["senha"];

    echo "insert into pessoas (nome,senha) values ('$nominho','$senha');";
    mysqli_query($conn,"insert into pessoas (nome,senha) values ('$nominho','$senha');");
    $result = mysqli_query($conn,"select nome, senha from pessoas;");

    header("Location: cadastrado.html");



?>
