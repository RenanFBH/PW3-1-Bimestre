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

    if (isset($_SESSION["user"])) {	
    } else {
        $_SESSION["message"] = "Você deve estar logado para acessar esse recurso!";
        $_SESSION["type"] = "danger";
		header("Location: " . BASEURL . "index.php");
        exit;
    }

    view($_GET["id"]);
    include(HEADER_TEMPLATE); 
?>
			<!-- View Gerentes -->
			<div class="container-view-gerentes container-lg">
				<h2 class="mt-5">Gerente <?php echo $gerente['id']; ?></h2>
				<hr>
				<div class="row">
					<div class="col-6">
						<dl class="dl-horizontal">
							<dt>Nome / Razão Social:</dt>
							<dd><?php echo $gerente['nome']; ?></dd>
							<dt>Endereço:</dt>
							<dd><?php echo $gerente['endereco']; ?></dd>
							<dt>Data de Nascimento:</dt>
							<dd><?php echo formatadata($gerente['datanasc'], "d/m/Y"); ?></dd>
						</dl>
						<dl class="dl-horizontal">
							<dt>Departamento:</dt>
							<dd><?php echo $gerente['depto']; ?></dd>				
							<dt>Data de Cadastro:</dt>
							<dd><?php echo formatadata($gerente['criacao'], "d/m/Y - H:i:s"); ?></dd>				
							<dt>Data de Alteração:</dt>
							<dd><?php echo formatadata($gerente['modificacao'], "d/m/Y - H:i:s"); ?></dd>
						</dl>
					</div>
					<div class="col-md-4">
						<dl class="dl-horizontal">
							<dt>Foto:</dt>
							<dd>
								<?php
									if (!empty($gerente['foto'])) {
										echo "<img src=\"fotos/" . $gerente['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"250px\">\n"; 
									} else {
										echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"250px\">\n";
									}
								?>
							</dd>
						</dl>
					</div>
					<div id="actions" class="row mt-2">
						<div class="col-md-12">
						<a href="edit.php?id=<?php echo $gerente['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
							<a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
						</div>
					</div>
				</div>
			</div>
<?php include(FOOTER_TEMPLATE); ?>