<title>Atualizar loja</title>

<body>
    <?php
    include('../../includes/styles/header.php');
    ?>
    <div class="container m-auto sm:px-12">
        <h1 class="text-2xl font-semibold my-8">Editar Registro</h1>

        <?php

        require('../BD/conexao.php');
        try {
            $idLoja = $_GET['id_loja'];
            $sqlSelect = "SELECT id_loja, nome_loja, segmento FROM loja WHERE id_loja = ?;";
            $statement = $conn->prepare($sqlSelect);
            $statement->bindParam(1, $idLoja, PDO::PARAM_INT); // Corrigido o índice e tipo
            $statement->execute();

            if ($statement->rowCount() == 1) {
                $row = $statement->fetch();
                ?>
                <form action="update.php?id_loja=<?php echo $idLoja; ?>" method="post">
                    <div class="mb-4">
                        <div class="mb-4">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                value="<?php echo htmlspecialchars($row['nome_loja']); ?>" required>
                        </div>
                        <div class="mb-6">
                            <label for="segmento">
                                Segmento
                            </label>
                            <input type="text" name="segmento" id="segmento"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                value="<?php echo htmlspecialchars($row['segmento']); ?>" required>
                        </div>
                    </div>
                    <button class="transition px-8 py-2 text-md font-medium text-white bg-sky-500 hover:bg-sky-600 rounded-lg text-center">Atualizar</button>
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
            && isset($_GET['id_loja'])
        ) {
            $id = $_GET['id_loja'];
            $nomeNovo = $_POST['nome'];
            $segmentoNovo = $_POST['segmento'];
            $sqlUpdate = "UPDATE loja SET
                nome_loja = :nome,
                segmento = :segmento
                WHERE id_loja = :id"; // Adicionada cláusula WHERE
            try {
                $statement = $conn->prepare($sqlUpdate);
                $statement->bindParam(':nome', $nomeNovo, PDO::PARAM_STR);
                $statement->bindParam(':segmento', $segmentoNovo, PDO::PARAM_STR);
                $statement->bindParam(':id', $id, PDO::PARAM_INT); // Adicionada a vinculação do ID
                $statement->execute();
                echo "<script>
                    alert('Dados alterados com sucesso!');
                </script>";
                Header("Location: read.php");
            } catch (PDOException $erro) {
                die("ERRO NO UPDATE:  $erro");
            }
        }
        ?>
    <?php
    include('../styles/footer.php');
    ?>
</body>
