<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Colégio Primeira Opção - Login</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Story+Script&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-screen h-screen flex items-center justify-center bg-[url(<?= BASE_IMAGES ?>image-login.jpg?>)] bg-cover bg-center font-[Poppins]">

    <div class="overlay fixed top-0 left-0 w-screen h-screen bg-black opacity-50 z-10"></div>
    <section class="content-section bg-zinc-900 shadow-lg p-8 w-1/3 flex flex-col justify-center rounded-3xl z-20">
        <div class="flex items-center justify-center mb-5">
            <img class="max-w-[100px]" src="<?= BASE_IMAGES ?>/logo-removebg.png" alt="Logo">
            <h2 class="text-4xl text-gray-100 font-bold font-[Lobster]">Primeira <span class="text-3xl  text-blue-900">OPÇÃO</span></h2>
        </div>
            
            <form action="" method="POST" class="space-y-6">

                <?php if(isset($erro)): ?>
                    <div class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M4.93 4.93a10 10 0 0114.14 0 10 10 0 010 14.14 10 10 0 01-14.14 0 10 10 0 010-14.14z" />
                        </svg>
                        <?= $erro; ?>
                    </div>
                <?php endif ?>
    

                <!-- Usuário -->
                <div>
                    <label for="usuario" class="block text-sm font-medium text-gray-400">Usuário</label>
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        required
                        placeholder="Digite seu usuário"
                        value="<?= $usuario = isset($usuario) ? $usuario : '' ?>"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900"
                    />
                </div>
    
                <div>
                    <p class="text-sm text-gray-400">Digite o nome do usuário que enviaremos um email para o email vinculado com um Passo a Passo de como redefinir a senha.</p>
                </div>
    
                <!-- Botão -->
                <div>
                    <button
                        type="submit"
                        class="w-full bg-cyan-950 hover:bg-cyan-800 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
                    >
                        Entrar
                    </button>
                </div>
    
            </form>
        </section>
	

</body>
</html>
