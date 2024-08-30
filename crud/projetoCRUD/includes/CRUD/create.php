<title>Incluir Loja</title>
<?php
include("../../includes/styles/header.php");
?>

<div class="container m-auto sm:px-12">
    <h1 class="text-2xl font-semibold my-8">Novo Registro de Loja</h1>
    <form action="create.php" method="post">
        <div class="mb-4">
            <div class="mb-4">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    required>
            </div>
            <div class="mb-6">
                <label for="segmento">
                    Segmento
                </label>
                <input type="text" name="segmento" id="segmento"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    required>
            </div>
        </div>
        <button class="transition px-8 py-2 text-md font-medium text-white bg-sky-500 hover:bg-sky-600 rounded-lg text-center">Cadastrar</button>
    </form>
</div>

<?php
require("../BD/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "CAMPO VAZIO!";
    $segmento = isset($_POST['segmento']) ? $_POST['segmento'] : "CAMPO VAZIO!";

    $sqlInsert = "INSERT INTO loja (nome_loja, segmento) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sqlInsert);
    
    if ($stmt) {
        $stmt->bind_param("ss", $nome, $segmento);
        if ($stmt->execute()) {
            echo "<script>alert('Dados inseridos!');</script>";
        } else {
            die("Erro ao executar a query: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Erro ao preparar a query: " . $conn->error);
    }
    
    $conn->close();
}
?>

<?php include("../styles/footer.php"); ?>
