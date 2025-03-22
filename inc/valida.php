<?php
	include("../config.php");
	include(DBAPI);
	include(HEADER_TEMPLATE);
	if(!empty($_POST) AND (empty($_POST["login"]) OR empty($_POST["senha"]))) {
		if (!isset($_SESSION)) session_start();
		$_SESSION["message"] = "Por favor, preencha todos os campos!";
		$_SESSION["type"] = "danger";
	}
	
	$bd = open_database();
	try {
		$usuario = $_POST["login"];
		$senha = $_POST["senha"];
		
		if(!empty($usuario) && !empty($senha)) {
			$senha = criptografia($_POST["senha"]);
			
			$sql = "SELECT id, nome, user, password FROM usuarios WHERE (user = '" . $usuario . "') AND (password = '" . $senha . "') LIMIT 1";
			$query = $bd->query($sql);
			if ($query->rowCount() > 0) {
				$dados = $query->fetch(PDO::FETCH_ASSOC);
				echo "<b>";
				var_dump($dados);
				$id = $dados["id"];
				$nome = $dados["nome"];
				$user = $dados["user"];
				$password = $dados["password"];
				var_dump($user);
				
				if(!empty($user)) {
					if (!isset($_SESSION)) session_start();
					$_SESSION["message"] = "Bem vindo " . $nome . "!";
					$_SESSION["type"] = "info";
					$_SESSION["id"] = "$id";
					$_SESSION["nome"] = "$nome";
					$_SESSION["user"] = "$user";
					echo "<b>";
					var_dump($user);
					echo "<b>";
				} else {
					throw new Exception("Não foi possível se conectar!<br>Verifique seu usuário e senha.");
				}
				header("Location: " . BASEURL . "index.php");
			} else {
				throw new Exception("Não foi possível se conectar!<br>Verifique seu usuário e senha.");
			}
		} else {
			throw new Exception("Não foi possível se conectar!<br>Verifique seu usuário e senha.");
		}	
	} catch (Exception $e) {
		$_SESSION["message"] = "Ocorreu um erro: " . $e->GetMessage();
		$_SESSION["type"] = "danger";
	}
?>	
<?php if(!empty($_SESSION["message"])) :?>
			<div class="container-valida container-lg">
				<div class="alert alert-<?php echo $_SESSION["type"];  ?> alert-dismissible" role="alert" id="actions">
					<p><?php echo $_SESSION["message"]; ?></p>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
<?php clear_messages(); ?>
<?php endif; ?>
				<header>
					<a href="<?php echo BASEURL?>inc/login.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
				</header>
			</div>
<?php include(FOOTER_TEMPLATE); ?>	
