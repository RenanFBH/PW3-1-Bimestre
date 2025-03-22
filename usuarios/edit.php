<?php 
	include("functions.php"); 
    session_start();
	
	if (!isset($_GET['id']) || empty($_GET['id'])) {
        $_SESSION["message"] = "ID inválido ou não fornecido!";
        $_SESSION["type"] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }

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
	
	

    edit();
    include(HEADER_TEMPLATE); 
?>
			<!-- Edit Usuários -->
			<div class="container-edit-usuarios container-lg">
				<h2 class="mt-5">Alterar Usuário</h2>
				<form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data">
					<hr>
					<!-- Campo oculto para ID -->
					<input type="hidden" name="usuario[id]" value="<?php echo $usuario['id']; ?>">
					
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="name">Nome</label>
								<input type="text" maxLength="50" class="form-control" name="usuario[nome]" value="<?php echo $usuario["nome"]; ?>">
							</div>
							<div class="form-group">
								<label for="campo2">Login</label>
								<input type="text" maxLength="50" class="form-control" name="usuario[user]" value="<?php echo $usuario["user"]; ?>">
							</div>
							<div class="form-group">
								<label for="campo1">Senha</label>
								<input type="password" minLength="5" maxLength="50" class="form-control" name="usuario[password]" value="">
							</div>
							<div class="form-group">
								<label for="foto">Foto</label>
								<input type="file" class="form-control" id="foto" name="foto">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="imgPreview">Pré-visualização:</label>
								<img src="fotos/<?php echo $usuario["foto"]; ?>" id="imgPreview" class="shadow p-1 mb-1 bg-body rounded" width="250vw">
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