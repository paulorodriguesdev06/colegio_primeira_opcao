<?php 
require_once '../connection_db/conexao.php';




?>

<!DOCTYPE html>
<html lang="pt-br" class="bg-gray-100 dark:bg-gray-900">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperar Senha</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen px-4">

  <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 space-y-6">
    
    <div class="text-center">
      <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Recuperar Senha</h2>
      <p class="text-gray-500 dark:text-gray-400 text-sm">Digite seu e-mail para receber o link de recuperação.</p>
    </div>

    <form class="space-y-4" onsubmit="event.preventDefault(); handleSubmit();">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
        <input
          type="email"
          id="email"
          name="email"
          required
          class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
          placeholder="seuemail@exemplo.com"
        />
      </div>

      <button
        type="submit"
        class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition duration-300"
      >
        Enviar link de recuperação
      </button>
    </form>

    <div id="feedback" class="hidden mt-4 text-sm text-green-600 dark:text-green-400 text-center">
      📩 Um e-mail foi enviado com instruções para redefinir sua senha.
    </div>

    <div class="text-center text-sm text-gray-500 dark:text-gray-400">
      <a href="/login" class="hover:underline text-blue-600 dark:text-blue-400">Voltar para o login</a>
    </div>
  </div>

  <script>
    function handleSubmit() {
      const feedback = document.getElementById('feedback');
      feedback.classList.remove('hidden');
    }
  </script>
</body>
</html>


