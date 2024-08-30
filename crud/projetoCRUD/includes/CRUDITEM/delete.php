<title>Deletar Produto</title>
<body>
    <?php
        include('../styles/header.php');
        require('../BD/conexao.php');

        if ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET['id_produto'])) {
            $idProduto = $_GET['id_produto'];
            $sqlDelete = "DELETE FROM produto WHERE id_produto = ?";

            $stmt = $conn->prepare($sqlDelete);

            if ($stmt) {
                $stmt->bind_param("i", $idProduto);
                
                if ($stmt->execute()) {
                    echo "<script>alert('Registro Deletado.');</script>";
                    header("Location: read.php");
                    exit;
                } else {
                    die("ERRO: Não foi possível deletar. " . $stmt->error);
                }
            } else {
                die("Erro na preparação da query: " . $conn->error);
            }
        }

        header("Location: read.php");
        include('../styles/footer.php');
    ?>
</body>
