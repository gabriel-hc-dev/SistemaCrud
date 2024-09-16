<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-200">
    <?php
    include("../projetoCRUD/includes/styles/header.php");
    ?>
    <div class="align-middle mx-4 sm:mx-8 md:mx-16 lg:mx-32 xl:mx-40 2xl:mx-80 my-12">
        <div class="grid gap-10 grid-cols-1 sm:grid-cols-2">
            <!--CARD 1-->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="assets/images/1.avif" alt="Imagem de Loja" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <div class="flex flex-col space-y-4 my-2">
                        <a class="transition ease-in-out duration-300 bg-sky-500 text-center text-white py-2 px-4 rounded hover:bg-sky-600" href="includes/CRUD/create.php">
                            Cadastrar Loja</a>
                        <a class="transition ease-in-out duration-300 bg-sky-500 text-center text-white py-2 px-4 rounded hover:bg-sky-600" href="includes/CRUD/read.php">
                            Visualizar Loja</a>
                    </div>
                </div>
            </div>
            <!--CARD 2-->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="assets/images/2.jpg" alt="Imagem de Produto" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <div class="flex flex-col space-y-4 my-2">
                        <a class="transition ease-in-out duration-300 bg-sky-500 text-center text-white py-2 px-4 rounded hover:bg-sky-600" href="includes/CRUDITEM/create.php">
                            Cadastrar Produto</a>
                        <a class="transition ease-in-out duration-300 bg-sky-500 text-center text-white py-2 px-4 rounded hover:bg-sky-600" href="includes/CRUDITEM/read.php">
                            Visualizar Produto</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
