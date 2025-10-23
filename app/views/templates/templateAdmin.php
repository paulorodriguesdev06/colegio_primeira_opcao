<?php
namespace App\views\templates;
use App\Core\Controller;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colégio Primeira Opção</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?= BASE_ASSETS ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Story+Script&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="<?= BASE_ASSETS ?>/js/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/fb70a83e7a.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 w-screen h-screen font-[Poppins]">

    <header>
        <div class="relative">
            <nav id="left-menu" class="flex flex-col fixed left-0 w-60 h-full bg-blue-700 shadow-lg text-gray-100 text-sm p-4 ">

                <div class="logo-box flex mb-[10%]">
                    <img src="<?= BASE_IMAGES ?>logo.jpg?>" class="max-w-[50px] rounded-full" alt="Logo-image">
                    <h2 class="text-xl font-[Lobster] block pl-2">Colégio <span class="flex">Primeira Opção</span></h2>
                </div>

                <div class="w-full h-px rounded-3xl bg-gray-300 mb-4"></div>

                <div class="nav-links flex flex-col gap-1">

                    <!-- Home -->

                    <a href="<?= BASE_URL ?>/adminHome" class="nav-link flex gap-2 transition hover:bg-blue-800 p-2 rounded-xl">
                        <i class="fa-regular fa-house text-lg"></i>
                        Home
                    </a>

                    <!-- Calendário -->

                    <a href="<?= BASE_URL ?>/calendario" class="nav-link flex gap-2 items-center transition hover:bg-blue-800 p-2 rounded-xl">
                        <i class="fa-regular fa-calendar-days text-lg"></i>
                        Calendário
                    </a>

                    <!-- Funcionários -->

                    <a href="<?= BASE_URL ?>/funcionarios" class="nav-link flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <i class="fa-solid fa-user-group text-lg"></i>
                        Funcionários
                    </a>

                    <!-- Alunos -->

                    <a href="<?= BASE_URL ?>/alunos" class="nav-link flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <i class="fa-regular fa-user text-lg"></i>
                        Alunos
                    </a>

                    <!-- Documentos -->

                    <a href="<?= BASE_URL ?>/documentos" class="nav-link flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl" id="documents-nav">
                        <i class="fa-regular fa-folder-open text-lg transition"></i>
                        Documentos
                        <i class="fa-solid fa-chevron-down" id="arrow-document"></i>
                    </a>

                    <!-- Dropdown Documentos -->

                    <div class="overflow-hidden max-h-0 opacity-0 transition-all duration-400 ease-in-out ml-4" id="documents-dropdown">

                        <!-- Provas -->

                        <a href="<?= BASE_URL ?>/provas" class="nav-link flex gap-2 items-center p-2 ml-4 transition delay-100 hover:bg-blue-800 rounded-xl dropdown">
                            <i class="fa-regular fa-file-lines text-lg"></i>
                            Provas
                        </a>

                        <!-- Doc. Escolares -->

                        <a href="<?= BASE_URL ?>/documentosEscolares" class="nav-link flex gap-2 items-center p-2 ml-4 mt-1 transition delay-100 hover:bg-blue-800 rounded-xl dropdown">
                            <i class="fa-regular fa-file-pdf text-lg"></i>
                            Doc. Escolares
                        </a>
                    </div>

                    <!-- Financeiro -->

                    <a href="<?= BASE_URL ?>/financeiro" class="nav-link flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <i class="fa-regular fa-money-bill-1 text-lg"></i>
                        Financeiro
                    </a>
                </div>

                <!-- Div do rodape do menu -->

                <div class="nav-footer h-full flex flex-col justify-end mb-4">

                    <a href="#" id="tema" class="nav-link flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <i id="tema-icon" class="fa-regular fa-sun text-lg transition-all ease-in-out"></i>
                        Tema
                    </a>

                    <!-- Suporte -->

                    <a href="#" class="nav-link flex gap-2 items-center transition delay-100 hover:bg-blue-800 p-2 rounded-xl">
                        <i class="fa-solid fa-gear text-lg"></i>
                        Suporte
                    </a>

                </div>
            </nav>
        </div>

        <!-- Top Menu -->

        <div id="top-menu" class="fixed top-0 w-[calc(100%-240px)] h-13 ml-60 px-6 flex justify-between items-center bg-slate-100 border-b border-b-gray-200 shadow text-gray-700">

            <h2>Olá, <?= $_SESSION['nome'] ?></h2>

            <div class="flex items-center gap-2">
                <i id="arrow-perfil-dropdown" class="fa-solid fa-chevron-down text-sm cursor-pointer transition-all"></i>
                <i class="fa-regular fa-user text-xl"></i>

                <!-- Perfil / LogOut - Box -->

                <div id="perfil-dropdown" class="max-h-0 opacity-0 px-4 py-3 pointer-events-none transition-all absolute top-13 right-8 overflow-hidden flex bg-slate-100 border border-gray-200 text-sm text-nowrap rounded-br-xl rounded-bl-xl">
                    <div class="flex flex-col gap-2 w-full">
                        <a href="<?= BASE_URL ?>/adminHome/verPerfil" class="hover:underline transition-all">
                            <i class="fa-solid fa-circle-info"></i>
                            Perfil
                        </a>

                        <a id="logout-link" class="hover:underline transition-all" href="<?= BASE_URL ?>/session/logout" onclick="return confirm('Deseja realmente sair?')">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Sair
                        </a>

                    </div>
                </div>

            </div>
        </div>

    </header>

    <!-- Conteúdo da View -->

    <main class="w-[calc(100%-240px)] h-[calc(100%-52px)] ml-60 pt-17 px-6">

        <?php $this->view($view, $viewData); ?>

    </main>


    <!-- Script -->

    <script>
        $(document).ready(function() {

            $('#tema').on('click', function() {
                const $icon = $('#tema-icon');

                $icon.addClass('opacity-0 rotate-180 transition-all duration-300'); // sai suavemente

                setTimeout(() => {
                    if ($icon.hasClass('fa-sun')) {
                        $icon.removeClass('fa-sun').addClass('fa-moon');
                    } else {
                        $icon.removeClass('fa-moon').addClass('fa-sun');
                    }

                    $icon.removeClass('rotate-180');
                    $icon.removeClass('opacity-0').addClass('opacity-100');
                }, 300); // mesma duração do fade
            });

            $('.nav-link').click(function() {
                if ($(this).hasClass('dropdown')) {
                    $('#documents-nav').addClass('bg-blue-800');
                }
                $('.nav-link').removeClass('bg-blue-800');
                $(this).toggleClass('bg-blue-800');
            });


            $('#documents-nav').on('click', function(e) {
                e.preventDefault();

                const $dropdown = $('#documents-dropdown');
                const $arrow = $('#arrow-document');

                if ($dropdown.hasClass('max-h-0')) {
                    // Abrir com transição suave
                    $dropdown.removeClass('max-h-0 opacity-0').addClass('max-h-40 opacity-100');
                    $arrow.addClass('rotate-180');
                } else {
                    // Fechar com transição suave
                    $dropdown.removeClass('max-h-40 opacity-100').addClass('max-h-0 opacity-0');
                    $arrow.removeClass('rotate-180');
                }
            });

            $('#arrow-perfil-dropdown').on('click', function(e) {
                e.preventDefault();

                const $dropdown = $('#perfil-dropdown');
                const $arrow = $('#arrow-perfil-dropdown');

                if ($dropdown.hasClass('max-h-0')) {
                    $dropdown.removeClass('max-h-0 opacity-0 pointer-events-none')
                        .addClass('max-h-20 opacity-100 pointer-events-auto');
                    $arrow.addClass('rotate-180');
                } else {
                    // Fechar
                    $dropdown.removeClass('max-h-20 opacity-100 pointer-events-auto')
                        .addClass('max-h-0 opacity-0 pointer-events-none');
                    $arrow.removeClass('rotate-180');
                }

            });

        });
    </script>