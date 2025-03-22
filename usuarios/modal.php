<?php
	if (!isset($_SESSION)) session_start();
	if (isset($_SESSION["user"])){
		if ($_SESSION["user"] != "admin") {
			$_SESSION["message"] = "Você precisa ser administrador para acessar esse recurso!";
			$_SESSION["type"] = "danger";
			header("Location:" . BASEURL . "index.php");
		}
	} else {
		$_SESSION["message"] = "Você estar logado e ser administrador para acessar esse recurso!";
			$_SESSION["type"] = "danger";
			header("Location:" . BASEURL . "index.php");
	}
?>
			<!-- Modal -->
			<div class="modal fade" id="delete-modal-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Usuário?</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h5>Deseja realmente excluir este usuário?</h5>
						</div>
						<div class="modal-footer">		
							<a href="#" id="confirm" class="btn btn-dark"><i class="fa-solid fa-square-check"></i> Sim</a>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-square-xmark"></i> Não</button>
						</div>
					</div>
				</div>
			</div>
