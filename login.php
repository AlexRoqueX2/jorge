<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'card';    
    $conn = new mysqli($servername, $username, $password,$dbname);

    if( $conn->connect_error ) {
        die('Falha ao conectar a db'. $conn->connect_error);
    }else{
        echo "conexão deu certo ";
    }

    $_SESSION["nome"] = $_POST["usuário"];
    $_SESSION["senha"] = $_POST["senha"];

    echo $_SESSION["nome"];
    echo $_SESSION["senha"];

    $nominho = $_SESSION["nome"];
    $senha = $_SESSION["senha"];

    $result = mysqli_query($conn,"select nome, senha from pessoas;");
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["nome"]. " - Nome: " . $row["senha"]. "<br>";
            $corno = $row["nome"];
            $corno2 = $row["senha"];
        }
    } else {
        echo "0 resultados encontrados";
    }
    
    echo $corno;
    echo $corno2;

    if ($_SESSION["nome"] == $corno && $_SESSION["senha"] == $corno2 ) {
        $_SESSION["logou"] = 1 ;
        header("Location: cadastrado.html");
        echo "funcionou";
    } else {
        $_SESSION["logou"] = 0;
        header("Location: Cadastro.html");
        echo "deu errado";
    }

?>