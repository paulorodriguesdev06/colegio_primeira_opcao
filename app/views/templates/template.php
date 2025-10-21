<?php
    namespace App\views\templates;
    use App\Core\Controller;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Story+Script&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="<?= BASE_ASSETS ?>/js/jquery-3.7.1.min.js"></script>
</head>
<script defer>
    
</script>

<body class="bg-gray-100 w-screen h-screen font-[Poppins] overflow-hidden">
    <header>
        <div class="relative">

            <nav id="left-menu" class="flex flex-col fixed left-0 w-[15%] h-full bg-slate-600 shadow-lg text-white text-sm p-4">

                <div class="absolute left-[94%] top-[7%] bg-white w-6 h-6 rounded-full text-black flex justify-center items-center">
                    >
                </div>

                <div class="logo-box flex mb-[10%]">
                    <img src="<?= BASE_IMAGES ?>logo-removebg.png?>" class="" alt="Logo-image">
                    <h2>Colégio Primeira Opção</h2>
                </div>

                <div class="nav-links flex flex-col gap-1">

                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-700 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-casa-64.png" alt="">
                        </div>
                        Home
                    </a>

                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-calendário-64.png" alt="">
                        </div>
                        Calendário
                    </a>

                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-funcionários-64.png" alt="">
                        </div>
                        Funcionários
                    </a>

                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-homem-estudante-64.png" alt="">
                        </div>
                        Alunos
                    </a>

                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl" id="documents-nav">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-abrir-pasta-64.png" alt="">
                        </div>
                        Documentos
                        <div class="max-w-3 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/seta-baixo.png" alt="">
                        </div>
                    </a>
                    <div class="hidden" id="documents-options">
                        <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                            <div class="max-w-5 flex items-center">
                                <img src="<?= BASE_IMAGES ?>/icons/icons8-pasta-64.png" alt="">
                            </div>
                            Pasta 1
                        </a>
                        <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                            <div class="max-w-5 flex items-center">
                                <img src="<?= BASE_IMAGES ?>/icons/icons8-pasta-64.png" alt="">
                            </div>
                            Pasta 2
                        </a>
                    </div>

                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-dinheiro-64.png" alt="">
                        </div>
                        Financeiro
                    </a>
                </div>

                <div class="nav-footer h-full flex flex-col justify-end mb-4">
                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-configurações-64.png" alt="">
                        </div>
                        Configurações
                    </a>
                    <a href="#" class="flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <div class="max-w-5 flex items-center">
                            <img src="<?= BASE_IMAGES ?>/icons/icons8-suporte-64.png" alt="">
                        </div>
                        Suporte
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <?php
        $controll = new Controller();
        require_once $controll->view($view, $viewData); ?>
    </main>
    