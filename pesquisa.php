<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
    </style>

    <link rel="stylesheet" href="style2.php">

    <title>Resultados da Pesquisa</title>
</head>
<body>
    <h1>Resultados da Pesquisa</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bancodedados = "site1";

    //cria uma nova instancia para conectar ao banco de dados
    $mysqli = new mysqli($servername, $username, $password, $bancodedados);

    //verifica se a conexão deu certo
    if ($mysqli->connect_error) {
        die("Conexão falhou: " . $mysqli->connect_error);
    }

    //capturando informações da URL com o GET 
    $cliente = $_GET['cliente'];
    $vendedor = $_GET['vendedor'];
    $data_inicial = $_GET['data_inicial'];
    $data_final = $_GET['data_final'];

    //montagem da consulta para relizar a busca dos dados
    $sql = "SELECT * FROM orcamentos WHERE cliente LIKE '%$cliente%' AND vendedor LIKE '%$vendedor%'";

    //restrição de datas
    if (!empty($data_inicial) && !empty($data_final)) {
        $sql .= " AND data_hora BETWEEN '$data_inicial' AND '$data_final'";
    }

    //ordenando por data os resultados
    $sql .= " ORDER BY data_hora DESC";

    //consulta ao banco
    $result = $mysqli->query($sql);

    //verifica se existe resultados a mostrar
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data e Hora</th>
                    <th>Vendedor</th>
                    <th>Descrição</th>
                    <th>Valor Orçado</th>
                    <th>Ações</th>
                </tr>";

        //resultaos
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["cliente"] . "</td>";
            echo "<td>" . $row["data_hora"] . "</td>";
            echo "<td>" . $row["vendedor"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "<td>" . $row["valor"] . "</td>";
            echo "<td>
            <a href= 'acoes.php?acao=editar&id=". $row["id"]."'>Editar</a> |
            <a href= 'acoes.php?acao=remover&id=". $row["id"]."'>Remover</a>
            </td>";
            echo "</tr>";
        }

        //fecha a tabela
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    //fecha o banco de dados
    $mysqli->close();
    ?>
