<title>Atualizar loja</title>

<body>
    <?php
    include('../../includes/styles/header.php');
    ?>
    <div class="container m-auto sm:px-12">
        <h1 class="text-2xl font-semibold my-8">Editar Registro</h1>

        <?php
        require('../BD/conexao.php');
        
        if (isset($_GET['id_loja'])) {
            $idLoja = $_GET['id_loja'];
            $sqlSelect = "SELECT id_loja, nome_loja, segmento FROM loja WHERE id_loja = ?";
            $stmt = $conn->prepare($sqlSelect);
            
            if ($stmt) {
                $stmt->bind_param("i", $idLoja);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
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
                
                $stmt->close();
            } else {
                die("Erro na preparação da query: " . $conn->error);
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id_loja'])) {
            $id = $_GET['id_loja'];
            $nomeNovo = $_POST['nome'];
            $segmentoNovo = $_POST['segmento'];
            $sqlUpdate = "UPDATE loja SET nome_loja = ?, segmento = ? WHERE id_loja = ?";
            
            $stmt = $conn->prepare($sqlUpdate);
            
            if ($stmt) {
                $stmt->bind_param("ssi", $nomeNovo, $segmentoNovo, $id);
                
                if ($stmt->execute()) {
                    echo "<script>alert('Dados alterados com sucesso!');</script>";
                    header("Location: read.php");
                    exit;
                } else {
                    die("ERRO NO UPDATE: " . $stmt->error);
                }
                
            } else {
                die("Erro na preparação da query: " . $conn->error);
            }
        }
        ?>
    <?php
    include('../styles/footer.php');
    ?>
</body>
