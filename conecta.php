<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .mensagem-ok{
            text-align: center;
            font-weight: bold;
            
        }

        .mensagem_erro {
            text-align: center;
            font-weight: bold;
            color: red;
        }
    </style>

<?php
    
    //Essas sao as configurações do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bancodedados = "site1";
    
    //cria uma nova instancia para conectar ao banco de dados
    $mysqli = new mysqli($servername, $username, $password, $bancodedados);

    //if a função se e se nao, verifica se houve algum erro na conexão
    //poderia retornar um else informando que esta conectado ao banco de dados
    if ($mysqli->connect_error) {
        echo "Erro na conexão: (" . $mysqli->connect_error . ") " . $mysqli->connect_error ;
    }

    //captura os dados que vieram do formulario
    $cliente = $_POST['cliente'];
    $data_hora = $_POST['data_hora'];
    $vendedor = $_POST['vendedor'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    //monatgem da informação para adicionar ao banco de dados
    $sql = "INSERT INTO orcamentos (cliente, data_hora, vendedor, descricao, valor) VALUES ('$cliente', '$data_hora', '$vendedor', '$descricao', '$valor')";

    //executa o banco de dados e verifica se deu certo
    if ($mysqli->query($sql) === TRUE) {
    echo "<div class= 'mensagem-ok'>Orçamento cadastrado com sucesso!</div>";
    } else {
    echo "<div>class= 'mensagem-erro'Erro ao cadastrar orçamento: </div>" . $mysqli->error;
}
//fecha a conexão com o banco de dados
$mysqli->close();

?>
