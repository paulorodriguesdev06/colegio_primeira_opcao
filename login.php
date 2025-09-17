<?php require './connection_db/coneccao.php';

$sql = "SELECT * FROM `funcionarios` WHERE usuario = :usuario";
$stmt = $pdo->prepare($sql);
$erro = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
		$usuario = htmlspecialchars($_POST['usuario']);
		$senha = htmlspecialchars($_POST['senha']);

		$stmt->bindParam(':usuario', $usuario);
		$stmt->execute();

		$registro = $stmt->fetch(PDO::FETCH_ASSOC);

		if($registro['usuario'] == $usuario && password_verify($senha, $registro['senha'])) {
			if ($registro['admin'] == 1) {
				header('Location: admin/home_admin.php');
			} else {
				$erro = "Você não tem permissão para acessar o sistema!";
			};
		} else {
			$erro = "Usuário ou senha incorretos.";
		};
		

	};
	
};



?>

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
<body class="flex justify-center items-center w-screen h-screen bg-gray-100 font-[Poppins]">

    <div class="bg-white shadow-lg p-8 rounded-3xl w-full max-w-md">
    	<div class="flex items-center justify-center mb-2">
      		<img class="max-w-[100px]" src="./images/logo.jpg" draggable="false"  alt="">
      		<h2 class="text-4xl font-bold font-[Lobster]">Primeira <span class="text-3xl  text-blue-800">OPÇÃO</span></h2>
      	</div>
		
	    <form action="" method="POST" class="space-y-6">
	      
	      <!-- Usuário -->
    		<div>
		        <label for="usuario" class="block text-sm font-medium text-gray-700">Usuário</label>
		        <input
		          type="text"
		          id="usuario"
		          name="usuario"
		          required
		          placeholder="Digite seu usuário"
		          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
		        />
	        </div>

	      <!-- Senha -->
	      	<div>
		        <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
		        <input
		          type="password"
		          id="senha"
		          name="senha"
		          required
		          placeholder="Digite sua senha"
		          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
		        />
	     	</div>

	     	<?php if(isset($erro)): ?>
			    <div class="mt-2 text-sm text-red-600 flex items-center">
		            <svg class="w-4 h-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
		                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
		                    d="M12 9v2m0 4h.01M4.93 4.93a10 10 0 0114.14 0 10 10 0 010 14.14 10 10 0 01-14.14 0 10 10 0 010-14.14z" />
		            </svg>
		            <?= $erro; ?>
		        </div>
    		<?php endif ?>

	      <!-- Botão -->
	      	<div>
		        <button
		          type="submit"
		          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300"
		        >
		          Entrar
		        </button>
	      	</div>

	    </form>

		    <!-- Rodapé -->
	    <p class="text-center text-sm text-gray-500 mt-6">
	    	Esqueceu a senha? <a href="Recuperar_senha/recuperarSenha.php" class="text-blue-600 hover:underline">Recuperar acesso</a>
	    </p>
	</div>

</body>
</html>
