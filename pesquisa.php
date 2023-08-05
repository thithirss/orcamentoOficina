<!DOCTYPE html>
<html>
<head>
    <title>Resultados da Pesquisa</title>
</head>
<body>
    <h1>Resultados da Pesquisa</h1>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bancodedados = "site1";

    $mysqli = new mysqli($servername, $username, $password, $bancodedados);
    if ($mysqli->connect_error) {
        die("Conexão falhou: " . $mysqli->connect_error);
    }

    $cliente = $_GET['cliente'];
    $vendedor = $_GET['vendedor'];
    $data_inicial = $_GET['data_inicial'];
    $data_final = $_GET['data_final'];

    $sql = "SELECT * FROM orcamentos WHERE cliente LIKE '%$cliente%' AND vendedor LIKE '%$vendedor%'";

    if (!empty($data_inicial) && !empty($data_final)) {
        $sql .= " AND data_hora BETWEEN '$data_inicial' AND '$data_final'";
    }

    $sql .= " ORDER BY data_hora ASC"; // Ordenar por data decrescente

    $result = $mysqli->query($sql);

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

        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    $mysqli->close();
    ?>
</body>
</html>
