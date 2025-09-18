<?php require_once '../connection_db/conexao.php';

$sql = "INSERT INTO `funcionarios`(`usuario`, `senha`, `nome`, `telefone`, `serie`, `especialidade`, `admin`) VALUES ( :usuario, :senha, :nome, :telefone, :serie, :especialidade, :admin)";
$stmt = $pdo->prepare($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	try {
		if (!empty($_POST['usuario']) && !empty( $_POST['senha']) && !empty( $_POST['nome']) && !empty( $_POST['admin'])) {

			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			$nome = $_POST['nome'];
			$telefone = $_POST['telefone'] ?? null;
			$serie = $_POST['serie'] ?? null;
			$especialidade = $_POST['especialidade'] ?? null;
			$admin = $_POST['admin'];

			$stmt->bindParam(':usuario', $usuario);
			$stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT));
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':telefone', $telefone);
			$stmt->bindParam(':serie', $serie);
			$stmt->bindParam(':especialidade', $especialidade);
			$stmt->bindParam(':admin', $admin);

			$stmt->execute();
			header('Location:home_admin.php');
		};
	} catch (Exception $e) {
		$erro = $e->getMessage();
	};
	

	

};


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro Escolar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex w-screen h-screen">

  	<div class="bg-white shadow-lg rounded-lg p-8 max-w-1/2">
    	<h2 class="text-3xl font-bold font- text-gray-800 text-center mb-8">Cadastro de Funcionário</h2>

    	<form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">

	      <!-- Usuário -->
	      	<div>
	        	<label for="usuario" class="block text-sm font-medium text-gray-700">Usuário *</label>
	        	<input
	          	type="text"
	          	id="usuario"
	          	name="usuario"
	          	required
	          	placeholder="Digite o usuário"
	          	class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
	        />
	      </div>

	      <!-- Senha -->
	      	<div>
	        	<label for="senha" class="block text-sm font-medium text-gray-700">Senha *</label>
	        	<input
	          	type="password"
	          	id="senha"
	          	name="senha"
	          	required
	          	placeholder="Digite a senha"
	          	class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
	        />
	      	</div>

	      <!-- Nome -->
	      <div>
	        <label for="nome" class="block text-sm font-medium text-gray-700">Nome *</label>
	        <input
	          type="text"
	          id="nome"
	          name="nome"
	          required
	          placeholder="Nome completo"
	          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
	        />
	      </div>

	      <!-- Telefone -->
	      <div>
	        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
	        <input
	          type="tel"
	          id="telefone"
	          name="telefone"
	          placeholder="(99) 99999-9999"
	          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
	        />
	      </div>

	      <!-- Série -->
	      	<div>
		        <label for="serie" class="block text-sm font-medium text-gray-700">Série</label>
		        <select
			        id="serie"
			        name="serie"
					class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
			        >
			        <option value="" selected disabled>Selecione a série</option>
			        <option value="Maternal">Maternal</option>
			        <option value="Pré I">Pré I</option>
			        <option value="Pré II">Pré II</option>
			        <option value="1º ano">1º ano</option>
			        <option value="2º ano">2º ano</option>
			        <option value="3º ano">3º ano</option>
			        <option value="4º ano">4º ano</option>
			        <option value="5º ano">5º ano</option>
			        <option value="6º ano">6º ano</option>
			        <option value="7º ano">7º ano</option>
			        <option value="8º ano">8º ano</option>
			        <option value="9º ano">9º ano</option>
		        </select>
	      	</div>

	      	<!-- Especialidade -->
	      	<div>
		        <label for="especialidade" class="block text-sm font-medium text-gray-700">Especialidade</label>
		        <select
		          id="especialidade"
		          name="especialidade"
		          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
		        >
		          <option value="" selected disabled>Selecione a especialidade</option>
		          <option value="Diretora">Diretora</option>
		          <option value="Secretária">Secretária</option>
		          <option value="Professora">Professora</option>
		          <option value="Auxiliar Geral">Auxiliar Geral</option>
	        	</select>
	      	</div>

	      	<!-- Admin -->
	      	<div>
	        	<label for="admin" class="block text-sm font-medium text-gray-700">Administrador *</label>
	        	<select
	          	id="admin"
	          	name="admin"
	          	required
	          	class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
	   			>
	          		<option value="0">Não</option>
	          		<option value="1">Sim</option>
	        	</select>
	      	</div>

	      	<!-- Botão de Enviar -->
	      	<div class="md:col-span-2">
		        <button
		          type="submit"
		          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md transition duration-300"
		        >
		          Cadastrar Funcionário
		        </button>
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

    	</form>
	</div>

</body>
</html>
