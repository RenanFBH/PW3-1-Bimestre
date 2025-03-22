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
			<div class="container-add-customers container-lg">
				<h2 class="mt-5">Novo Cliente</h2>
				<form action="add.php" method="post">
					<!-- area de campos do form -->
					<hr />
					<div class="row">
						<div class="form-group col-md-7">
							<label for="name">Nome / Razão Social</label>
							<input type="text" class="form-control" name="customer[name]" maxlength="255" required>
						</div>

						<div class="form-group col-md-3">
							<label for="campo2">CNPJ / CPF</label>
							<input type="text" class="form-control" name="customer[cpf_cnpj]" minlength="11" maxlength="14" pattern="[0-9]*" required>
						</div>

						<div class="form-group col-md-2">
							<label for="campo3">Data de Nascimento</label>
							<input type="date" class="form-control" name="customer[birthdate]" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="campo1">Endereço</label>
							<input type="text" class="form-control" name="customer[address]" maxlength="255" required>
						</div>
						<div class="form-group col-md-3">
							<label for="campo2">Bairro</label>
							<input type="text" class="form-control" name="customer[hood]" maxlength="100" required>
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">CEP</label>
							<input type="text" class="form-control" name="customer[zip_code]" minlength="8" maxlength="8" pattern="[0-9]*" required>
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Data de Cadastro</label>
							<input type="date" class="form-control" name="customer[created]" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="campo1">Município</label>
							<input type="text" class="form-control" name="customer[city]" maxlength="100" required>
						</div>
						<div class="form-group col-md-2">
							<label for="campo2">Telefone</label>
							<input type="tel" class="form-control" name="customer[phone]" minlength="11" maxlength="11" pattern="[0-9]*" required>
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Celular</label>
							<input type="tel" class="form-control" name="customer[mobile]" minlength="11" maxlength="11" pattern="[0-9]*" required>
						</div>
						<div class="form-group col-md-1">
							<label for="campo3">UF</label>
							<select class="form-select" name="customer[state]" required>
								<option value="" selected disabled>Selecionar</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AP">AP</option>
								<option value="AM">AM</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MT">MT</option>
								<option value="MS">MS</option>
								<option value="MG">MG</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PR">PR</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RS">RS</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="SC">SC</option>
								<option value="SP">SP</option>
								<option value="SE">SE</option>
								<option value="TO">TO</option>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Inscrição Estadual</label>
							<input type="text" class="form-control" name="customer[ie]" minlength="12" maxlength="12"  pattern="[0-9]*" required>
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
<?php include(FOOTER_TEMPLATE); ?>