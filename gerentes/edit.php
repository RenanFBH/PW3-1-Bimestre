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

    edit();
    include(HEADER_TEMPLATE); 
?>	
			<!-- Edit Gerentes -->
			<div class="container-edit-gerentes container-lg">
				<h2 class="mt-5">Alterar Gerente</h2>
				<form action="edit.php?id=<?php echo $gerente['id']; ?>" method="post" enctype="multipart/form-data">
					<!-- area de campos do form -->
					<hr />
					<div class="row row-cols-1 row-cols-md-2">
						<div class="col">
							<div class="form-group col-12">
								<label for="name">Nome / Razão Social</label>
								<input type="text" maxLength="50"  class="form-control" name="gerente[nome]" value="<?php echo $gerente['nome']; ?>">
							</div>
							<div class="form-group col-12">
								<label for="campo2">Endereço</label>
								<input type="text" maxLength="50" class="form-control" name="gerente[endereco]" value="<?php echo $gerente['endereco']; ?>">
							</div>
							<div class="form-group col-12">
								<label for="campo3">Data de Nascimento</label>
								<input type="date" class="form-control" name="gerente[datanasc]" value="<?php echo formatadata($gerente['datanasc'], "Y-m-d"); ?>">
							</div>
							<div class="form-group col-12">
								<label for="campo1">Departamento</label>
								<select class="form-select" name="gerente[depto]" required>
									<option value="" disabled>Selecionar</option>
									<option value="Administrativo" <?php echo ($gerente['depto'] == 'Administrativo') ? 'selected' : ''; ?>>Administrativo</option>
									<option value="Recursos humanos" <?php echo ($gerente['depto'] == 'Recursos humanos') ? 'selected' : ''; ?>>Recursos humanos</option>
									<option value="Jurídico" <?php echo ($gerente['depto'] == 'Jurídico') ? 'selected' : ''; ?>>Jurídico</option>
									<option value="Comercial" <?php echo ($gerente['depto'] == 'Comercial') ? 'selected' : ''; ?>>Comercial</option>
									<option value="Finanças" <?php echo ($gerente['depto'] == 'Finanças') ? 'selected' : ''; ?>>Finanças</option>
									<option value="Vendas" <?php echo ($gerente['depto'] == 'Vendas') ? 'selected' : ''; ?>>Vendas</option>
									<option value="Criativo" <?php echo ($gerente['depto'] == 'Criativo') ? 'selected' : ''; ?>>Criativo</option>
									<option value="Logística" <?php echo ($gerente['depto'] == 'Logística') ? 'selected' : ''; ?>>Logística</option>
									<option value="Produção" <?php echo ($gerente['depto'] == 'Produção') ? 'selected' : ''; ?>>Produção</option>
									<option value="Engenharia" <?php echo ($gerente['depto'] == 'Engenharia') ? 'selected' : ''; ?>>Engenharia</option>
									<option value="Desenvolvimento" <?php echo ($gerente['depto'] == 'Desenvolvimento') ? 'selected' : ''; ?>>Desenvolvimento</option>
									<option value="Marketing" <?php echo ($gerente['depto'] == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
									<option value="Atendimento" <?php echo ($gerente['depto'] == 'Atendimento') ? 'selected' : ''; ?>>Atendimento</option>
									<option value="Qualidade" <?php echo ($gerente['depto'] == 'Qualidade') ? 'selected' : ''; ?>>Qualidade</option>    
								</select>
							</div>
							<div class="form-group col-12">
								<label for="campo3">Data de Cadastro</label>
								<input type="date" class="form-control" name="gerente[criacao]" disabled value="<?php echo formatadata($gerente['criacao'], "Y-m-d"); ?>">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="imgPreview">Pré-visualização:</label>
								<img src="fotos/<?php echo $gerente['foto']; ?>" id="imgPreview" class="shadow p-1 mt-1 bg-body rounded" width="250vw">
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