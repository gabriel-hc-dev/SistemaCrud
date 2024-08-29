<title>Listar Produtos</title>
<body class="bg-gray-50 text-gray-800">
    <?php include('../styles/header.php'); ?>
    
    <div class="container mx-auto p-12">
        <h2 class="text-3xl font-semibold mb-8">Produtos Cadastrados</h2>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <?php
                require('../BD/conexao.php');
                $sqlSelect = "SELECT id_produto, nome_produto, descricao, quantidade FROM produto;";
                try {
                    $statement = $conn->query($sqlSelect);
                    echo "<table class='min-w-full text-sm text-left text-gray-600'>
                        <thead class='bg-gray-100 text-gray-700'>
                            <tr>
                                <th class='px-6 py-4 border-b' scope='col'>ID</th>
                                <th class='px-6 py-4 border-b' scope='col'>NOME PRODUTO</th>
                                <th class='px-6 py-4 border-b' scope='col'>DESCRIÇÃO</th>
                                <th class='px-6 py-4 border-b' scope='col'>QUANTIDADE</th>
                                <th class='px-6 py-4 border-b' scope='col'>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>";
                    if ($statement->rowCount() > 0) {
                        while ($row = $statement->fetch()) {
                            echo "<tr class='bg-white border-b hover:bg-gray-50'>
                                    <th scope='row' class='px-6 py-4 font-medium text-gray-900'>" . $row["id_produto"] . "</th>
                                    <td class='px-6 py-4'>" . $row["nome_produto"] . "</td>
                                    <td class='px-6 py-4'>" . $row["descricao"] . "</td>
                                    <td class='px-6 py-4'>" . $row["quantidade"] . "</td>
                                    <td class='px-6 py-4'>
                                        <a href='update.php?id_produto=" . $row["id_produto"] . "' class='transition bg-sky-500 text-white ease-in-out py-2 px-4 rounded hover:shadow-md hover:bg-sky-600 duration-300'>Editar</a>
                                        <a href='delete.php?id_produto=" . $row["id_produto"] . "' class='transition bg-orange-400 text-white ease-in-out py-2 px-4 rounded hover:shadow-md hover:bg-orange-500 duration-300 ml-4'>Deletar</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='5' class='px-6 py-4 text-center text-gray-500'>Nenhum registro encontrado.</td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } catch (PDOException $erro) {
                    die("Não foi possível executar $sqlSelect. $erro");
                }
            ?>
        </div>
    </div>
    <?php
    include('../styles/footer.php');
    ?>
</body>
