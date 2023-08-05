<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $bancodedados = "site1";
    
    $mysqli = new mysqli($servername, $username, $password, $bancodedados);

    if ($mysqli->connect_error) {
        echo "Erro na conexão: (" . $mysqli->connect_error . ") " . $mysqli->connect_error ;
    }

    $cliente = $_POST['cliente'];
    $data_hora = $_POST['data_hora'];
    $vendedor = $_POST['vendedor'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO orcamentos (cliente, data_hora, vendedor, descricao, valor) VALUES ('$cliente', '$data_hora', '$vendedor', '$descricao', '$valor')";

    if ($mysqli->query($sql) === TRUE) {
    echo "Orçamento cadastrado com sucesso!";
    } else {
    echo "Erro ao cadastrar orçamento: " . $mysqli->error;
}

$mysqli->close();

?>
