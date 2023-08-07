<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Orçamento</title>
    <link rel="stylesheet" href="style.php">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;1,400;1,500&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="cadastro-orcamento">

            <div class="formulario">
                <h1>Cadastro de Orçamento</h1>
                <form action="conecta.php" method="post">
                    <label for="cliente">Cliente:</label>
                    <input type="text" id="cliente" name="cliente" required><br><br>

                    <label for="data_hora">Data e Hora:</label>
                    <input type="datetime-local" id="data_hora" name="data_hora" required><br><br>

                    <label for="vendedor">Vendedor:</label>
                    <input type="text" id="vendedor" name="vendedor" required><br><br>

                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" required></textarea><br><br>

                    <label for="valor">Valor Orçado:</label>
                    <input type="number" id="valor" name="valor" step="0.01" required><br><br>

                    <input class="botao" type="submit" value="Cadastrar Orçamento">

                </form>
            </div>
        </div>
    </main>
</body>
</html>