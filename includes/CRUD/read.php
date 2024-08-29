<title>Listar Lojas</title>

<body class="bg-gray-50 text-gray-800">
    <?php include('../styles/header.php'); ?>
    
    <div class="container mx-auto p-12">
        <h1 class="text-3xl font-semibold mb-8">Lojas Cadastradas</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <?php
            require('../BD/conexao.php');
            $sqlSelect = "SELECT id_loja, nome_loja, segmento FROM loja;";
            try {
                $statement = $conn->query($sqlSelect);
                echo "<table class='min-w-full text-sm text-left text-gray-600'>
                    <thead class='bg-gray-100 text-gray-700'>
                        <tr>
                            <th class='px-6 py-4 border-b' scope='col'>ID</th>
                            <th class='px-6 py-4 border-b' scope='col'>NOME LOJA</th>
                            <th class='px-6 py-4 border-b' scope='col'>SEGMENTO</th>
                            <th class='px-6 py-4 border-b' scope='col'>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>";
                if ($statement->rowCount() > 0) {
                    while ($row = $statement->fetch()) {
                        echo "<tr class='bg-white border-b hover:bg-gray-50'>
                                <th scope='row' class='px-6 py-4 font-medium text-gray-900'>" . $row["id_loja"] . "</th>
                                <td class='px-6 py-4'>" . $row["nome_loja"] . "</td>
                                <td class='px-6 py-4'>" . $row["segmento"] . "</td>
                                <td class='px-6 py-4'>
                                    <a href='update.php?id_loja=" . $row["id_loja"] . "' class='transition bg-sky-500 text-white ease-in-out py-2 px-4 rounded hover hover:shadow-md hover:bg-sky-600 duration-300'>Editar</a>
                                    <a href='delete.php?id_loja=" . $row["id_loja"] . "' class='transition bg-orange-400 text-white  ease-in-out py-2 px-4 rounded hover hover:shadow-md hover:bg-orange-500 duration-300 ml-4'>Deletar</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='4' class='px-6 py-4 text-center text-gray-500'>Nenhum registro encontrado.</td>
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
