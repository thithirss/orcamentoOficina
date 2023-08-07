
<?php

//config do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$bancodedados = "site1";

//conectando ao banco de dados
$mysqli = new mysqli($servername, $username, $password, $bancodedados);

//if a função se e se nao, verifica se houve algum erro na conexão
//poderia retornar um else informando que esta conectado ao banco de dados
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

//pega as acoes e o id da URL usando o metodo GET
$acao = $_GET['acao'];
$id = $_GET['id'];

//verifica qual acao que vai ser solicitada entre editar ou remover
if ($acao == 'editar') {

    header("Location: search.php");
    exit;
} elseif ($acao == 'remover') {
    header("Location: search.php");
    exit; 
}

$mysqli->close();
?>
