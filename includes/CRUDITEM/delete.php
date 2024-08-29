<title>Deletar Produto</title>
<body>
    <?php
        include('../styles/header.php');
        require('../BD/conexao.php');
        if($_SERVER["REQUEST_METHOD"] == 'GET'
        && isset($_GET['id_produto'])){
            $idProduto = $_GET['id_produto'];
            $sqlDelete = "DELETE FROM produto
                        WHERE id_produto =:produto";
            try{
                $statement = $conn->prepare($sqlDelete);
                $statement ->bindParam(':produto', $idProduto, PDO::PARAM_INT);
                $statement->execute();
                echo "<script>alert('Registro Deletado.');</script>";
                header("Location: read.php");
            }catch(PDOException $erro){
                die("ERRO: Não foi possível deletar. " . $erro->getMessage());
            }
        }
        header("Location; read.php");
        include('../styles/footer.php');
    ?>
</body>