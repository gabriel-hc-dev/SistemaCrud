<title>Deletar Loja</title>
<body>
    <?php
        include('../styles/header.php');
        require('../BD/conexao.php');
        if($_SERVER["REQUEST_METHOD"] == 'GET'
        && isset($_GET['id_loja'])){
            $idLoja = $_GET['id_loja'];
            $sqlDelete = "DELETE FROM loja 
                        WHERE id_loja =:id";
            try{
                $statement = $conn->prepare($sqlDelete);
                $statement ->bindParam(':id', $idLoja, PDO::PARAM_INT);
                $statement->execute();
                echo "<script>alert('Registro Deletado.');</script>";
                header("Location: read.php");
            }catch(PDOException $erro){
                die("ERRO: Não foi possível deletar :/"+$erro);
            }
        }
        header("Location; read.php");
        include('../styles/footer.php');
    ?>
</body>
    