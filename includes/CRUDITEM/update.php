<title>Atualizar Produto</title>

<body>
    <?php
    include('../../includes/styles/header.php');
    ?>
    <div class="container m-auto sm:px-12">
        <h1 class="text-2xl font-semibold my-8">Editar Registro</h1>

        <?php
        
        require('../BD/conexao.php');
        try {
            $idProduto = $_GET['id_produto'];
            $sqlSelect = "SELECT id_produto, nome_produto, descricao, quantidade FROM produto WHERE id_produto = ?;";
            $statement = $conn->prepare($sqlSelect);
            $statement->bindParam(1, $idProduto, PDO::PARAM_INT);
            $statement->execute();

            if ($statement->rowCount() == 1) {
                $row = $statement->fetch();
                ?>
                <form action="update.php?id_produto=<?php echo $idProduto; ?>" method="post">
                    <div class="mb-4">
                        <div class="mb-4">
                            <label for="nome_produto">Nome</label>
                            <input type="text" name="nome_produto" id="nome_produto"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                value="<?php echo htmlspecialchars($row['nome_produto']); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="descricao">Descrição</label>
                            <input type="text" name="descricao" id="descricao"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                value="<?php echo htmlspecialchars($row['descricao']); ?>" required>
                        </div>
                        <div class="mb-6">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                value="<?php echo htmlspecialchars($row['quantidade']); ?>" required>
                        </div>
                    </div>
                    <button
                        class="transition px-8 py-2 text-md font-medium text-white bg-sky-500 hover:bg-sky-600 rounded-lg text-center">Atualizar</button>
                </form>
            </div>
            <?php
            } else {
                echo "Registro não encontrado.";
            }
        } catch (PDOException $erro) {
            die($erro);
        }

        if (
            $_SERVER["REQUEST_METHOD"] == "POST"
            && isset($_GET['id_produto'])
        ) {
            $id = $_GET['id_produto'];
            $nomeNovo = $_POST['nome_produto'];
            $descricaoNovo = $_POST['descricao'];
            $quantidadeNovo = $_POST['quantidade'];
            $sqlUpdate = "UPDATE produto SET
                nome_produto = :nome,
                descricao = :descricao,
                quantidade = :quantidade
                WHERE id_produto = :id"; // Adicionada cláusula WHERE
            try {
                $statement = $conn->prepare($sqlUpdate);
                $statement->bindParam(':nome', $nomeNovo, PDO::PARAM_STR);
                $statement->bindParam(':descricao', $descricaoNovo, PDO::PARAM_STR);
                $statement->bindParam(':quantidade', $quantidadeNovo, PDO::PARAM_INT); // Alterado para PDO::PARAM_INT
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();
                echo "<script>
                    alert('Dados alterados com sucesso!');
                </script>";
                Header("Location: read.php"); // Redireciona após atualização
                exit(); // Adiciona exit() para garantir que o script seja encerrado
            } catch (PDOException $erro) {
                die("ERRO NO UPDATE:  $erro");
            }
        }
        ?>
    <?php
    include('../styles/footer.php');
    ?>
</body>
