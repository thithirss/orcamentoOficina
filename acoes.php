<?php
$servername = "localhost";
$username = "root";
$password = "";
$bancodedados = "site1";

$mysqli = new mysqli($servername, $username, $password, $bancodedados);
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'editar') {

    header("Location: search.php");
    exit;
} elseif ($acao == 'remover') {
    header("Location: search.php");
    exit;
}

$mysqli->close();
?>
