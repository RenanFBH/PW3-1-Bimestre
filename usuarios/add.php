<?php 
	include("functions.php");
	session_start();
	if (!isset($_SESSION)) session_start();
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
	add();
	include(HEADER_TEMPLATE);
?>
			<!-- Add Usuários -->
			<div class="container-add-usuarios container-lg">
				<h2 class="mt-5">Novo Usuário</h2>
				<form action="add.php" method="post" enctype="multipart/form-data">
					<hr>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="name">Nome</label>
								<input type="text" maxLength="50" class="form-control" id="name" name="usuario[nome]" required>
							</div>
							<div class="form-group">
								<label for="campo2">Login</label>
								<input type="text" maxLength="50" class="form-control" name="usuario[user]" required>
							</div>
							<div class="form-group">
								<label for="campo1">Senha</label>
								<input type="password" minLength="5"  maxLength="50" class="form-control" name="usuario[password]" required>
							</div>
							<div class="form-group">
								<label for="foto">Foto</label>
								<input type="file" class="form-control" id="foto" name="foto">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="imgPreview">Pré-visualização:</label>
								<img src="fotos/semimagem.jpg" id="imgPreview" class="shadow p-1 mb-1 bg-body rounded" width="250vw">
							</div>
						</div>
					</div>
					<div id="actions" class="row mt-2">
						<div class="col-md-12">
						<button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
						<a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
						</div>
					</div>
				</form>
			</div>
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script>
				$(document).ready(() => {
					$("#foto").change(function () {
						const file = this.files[0];
						if (file) {
							let reader = new FileReader();
							reader.onload = function (event) {
								$("#imgPreview").attr("src", event.target.result);
							};
							reader.readAsDataURL(file);
						}
					});
				});
			</script>
<?php include(FOOTER_TEMPLATE); ?>
