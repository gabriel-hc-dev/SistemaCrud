<title>Adicionar Produtos</title>

<?php
include("../../includes/styles/header.php"); ?>

<div class="container mx-auto sm:px-12">
    <h1 class="text-2xl font-semibold my-8">Novo Registro de Produto</h1>
    <form action="create.php" method="post">
        <div class="mb-4">
            <label for="nome">Nome</label>
            <input type="text" name="nome_produto" id="nome_produto"
                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                required>
            <label for="segmento">Descrição</label>
            <input type="text" name="descricao" id="descricao_produto"
                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                required>
            <label for="segmento">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade"
                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                required>
        </div>
        <button class="transition px-8 py-2 text-md font-medium text-white bg-sky-500 hover:bg-sky-600 rounded-lg text-center">Cadastrar</button>
    </form>
</div>

<?php
require("../BD/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_produto = isset($_POST['nome_produto']) ? $_POST['nome_produto'] : "CAMPO VAZIO!";
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "CAMPO VAZIO!";
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : "CAMPO VAZIO!";

    $sqlInsert = "INSERT INTO produto (nome_produto, descricao, quantidade) VALUES (?, ?, ?);";
    
    $stmt = $conn->prepare($sqlInsert);
    
    if ($stmt) {
        $stmt->bind_param("ssi", $nome_produto, $descricao, $quantidade);
        
        if ($stmt->execute()) {
            echo "<script>alert('Dados inseridos!');</script>";
        } else {
            die("Erro ao executar a query: " . $stmt->error);
        }
        
        $stmt->close();
    } else {
        die("Erro na preparação da query: " . $conn->error);
    }
}

include("../styles/footer.php");
?>
