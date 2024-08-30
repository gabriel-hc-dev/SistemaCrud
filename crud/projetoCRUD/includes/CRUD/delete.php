<title>Deletar Loja</title>
<body>
    <?php
        include('../styles/header.php');
        require('../BD/conexao.php');

        if ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET['id_loja'])) {
            $idLoja = $_GET['id_loja'];
            $sqlDelete = "DELETE FROM loja WHERE id_loja = ?";

            $stmt = $conn->prepare($sqlDelete);

            if ($stmt) {
                $stmt->bind_param("i", $idLoja);
                if ($stmt->execute()) {
                    echo "<script>alert('Registro Deletado.');</script>";
                    header("Location: read.php");
                    exit;
                } else {
                    die("ERRO: Não foi possível deletar: " . $stmt->error);
                }
            } else {
                die("ERRO: Não foi possível preparar a query: " . $conn->error);
            }
        }

        header("Location: read.php");
        include('../styles/footer.php');
    ?>
</body>
