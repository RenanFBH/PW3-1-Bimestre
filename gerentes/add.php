<?php 
	include("functions.php"); 
	session_start();
	if (!isset($_SESSION)) session_start();
	if (isset($_SESSION["user"])){	
	} else {
		$_SESSION["message"] = "Você deve estar logado para acessar esse recurso!";
		$_SESSION["type"] = "danger";
		header("Location: " . BASEURL . "index.php");
		exit;
	}
	add();
	include(HEADER_TEMPLATE); 
?>	
			<!-- Add Gerentes -->
			<div class="container-add-gerentes container-lg">
				<h2 class="mt-5">Novo Gerente</h2>
				<form action="add.php" method="post" enctype="multipart/form-data">
					<!-- area de campos do form -->
					<hr />
					<div class="row row-cols-1 row-cols-md-2">
						<div class="col">
							<div class="form-group col-12">
								<label for="name">Nome / Razão Social</label>
								<input type="text" maxLength="50"  class="form-control" name="gerente[nome]" required>
							</div>
							<div class="form-group col-12">
								<label for="campo2">Endereço</label>
								<input type="text" maxLength="50" class="form-control" name="gerente[endereco]" required>
							</div>
							<div class="form-group col-12">
								<label for="campo3">Data de Nascimento</label>
								<input type="date" class="form-control" name="gerente[datanasc]" required>
							</div>
							<div class="form-group col-12">
								<label for="campo1">Departamento</label>
								<select class="form-select" name="gerente[depto]" required>
									<option value="" selected disabled>Selecionar</option>
									<option value="Administrativo">Administrativo</option>
									<option value="Recursos humanos">Recursos humanos</option>
									<option value="Jurídico">Jurídico</option>
									<option value="Comercial">Comercial</option>
									<option value="Finanças">Finanças</option>
									<option value="Vendas">Vendas</option>
									<option value="Criativo">Criativo</option>
									<option value="Logística">Logística</option>
									<option value="Produção">Produção</option>
									<option value="Engenharia">Engenharia</option>
									<option value="Desenvolvimento">Desenvolvimento</option>
									<option value="Marketing">Marketing</option>
									<option value="Atendimento">Atendimento</option>
									<option value="Qualidade">Qualidade</option>    
								</select>
							</div>
							<div class="form-group col-12">
								<label for="campo3">Data de Cadastro</label>
								<input type="date" class="form-control" name="gerente[criacao]" disabled>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="imgPreview">Pré-visualização:</label>
								<img src="fotos/semimagem.jpg" id="imgPreview" class="shadow p-1 mt-1 bg-body rounded" width="250vw">
							</div>
							<div class="form-group">
								<label for="foto">Foto</label>
								<input type="file" class="form-control" id="foto" name="foto">
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