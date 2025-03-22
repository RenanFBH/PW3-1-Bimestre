<?php 
	include("functions.php");
	session_start();
	if (!isset($_SESSION)) session_start();
	
	if (!isset($_GET['id']) || empty($_GET['id'])) {
        $_SESSION["message"] = "ID inválido ou não fornecido!";
        $_SESSION["type"] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }
	
	if (isset($_SESSION["user"])){
		if ($_SESSION["user"] != "admin") {
			$_SESSION["message"] = "Você precisa ser administrador para acessar esse recurso!";
			$_SESSION["type"] = "danger";
			header("Location: " . BASEURL . "index.php");
			exit;
		}
	} else {
		$_SESSION["message"] = "Você deve estar logado e ser administrador para acessar esse recurso!";
			$_SESSION["type"] = "danger";
			header("Location: " . BASEURL . "index.php");
			exit;
	}
	view($_GET["id"]);
	include(HEADER_TEMPLATE);
?>
			<div class="container-view-usuarios container-lg">
				<h2 class="mt-5">Usuario <?php echo $usuario['id']; ?></h2>
				<hr>
				<div class="row">
					<div class="col-md-8">
						<dl class="dl-horizontal">
							<dt>Nome / Razão Social:</dt>
							<dd><?php echo $usuario['nome']; ?></dd>						
							<dt>user:</dt>
							<dd><?php echo $usuario['user']; ?></dd>		
						</dl>
					</div>
					<div class="col-md-4">
						<dl class="dl-horizontal">
							<dt>Foto:</dt>
							<dd>
								<?php
									if (!empty($usuario['foto'])) {
										echo "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"250px\">\n"; 
									} else {
										echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"250px\">\n";
									}
								?>
							</dd>
						</dl>
					</div>
				</div>
					<div id="actions" class="row mt-2">
						<div class="col-md-12">
							<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
							<a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
						</div>
					</div>
				</form>
			</div>
<?php include(FOOTER_TEMPLATE); ?>
