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
			<div class="container-edit-customers container-lg">
				<h2 class="mt-5">Alterar Cliente</h2>
				<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
					<!-- area de campos do form -->
					<hr />
					<div class="row">
						<div class="form-group col-md-7">
							<label for="name">Nome / Razão Social</label>
							<input type="text" class="form-control" name="customer[name]" value="<?php echo $customer['name']; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="campo2">CNPJ / CPF</label>
							<input type="text" class="form-control" name="customer[cpf_cnpj]" value="<?php echo $customer['cpf_cnpj']; ?>">
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Data de Nascimento</label>
							<input type="date" class="form-control" name="customer[birthdate]" value="<?php echo formatadata($customer['birthdate'], "Y-m-d"); ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="campo1">Endereço</label>
							<input type="text" class="form-control" name="customer[address]" value="<?php echo $customer['address']; ?>">
						</div>
						<div class="form-group col-md-3">
							<label for="campo2">Bairro</label>
							<input type="text" class="form-control" name="customer[hood]" value="<?php echo $customer['hood']; ?>">
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">CEP</label>
							<input type="text" class="form-control" name="customer[zip_code]" value="<?php echo $customer['zip_code']; ?>">
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Data de Cadastro</label>
							<input type="text" class="form-control" name="customer[created]" disabled value="<?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-5">
							<label for="campo1">Município</label>
							<input type="text" class="form-control" name="customer[city]" value="<?php echo $customer['city']; ?>">
						</div>
						<div class="form-group col-md-2">
							<label for="campo2">Telefone</label>
							<input type="tel" class="form-control" name="customer[phone]" value="<?php echo $customer['phone']; ?>">
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Celular</label>
							<input type="tel" class="form-control" name="customer[mobile]" value="<?php echo $customer['mobile']; ?>">
						</div>
						<div class="form-group col-md-1">
							<label for="campo3">UF</label>
							<select class="form-select" name="customer[state]">
								<option value="" selected disabled>Selecionar</option>
								<option value="AC" <?php echo ($customer['state'] == 'AC') ? 'selected' : ''; ?>>AC</option>
								<option value="AL" <?php echo ($customer['state'] == 'AL') ? 'selected' : ''; ?>>AL</option>
								<option value="AP" <?php echo ($customer['state'] == 'AP') ? 'selected' : ''; ?>>AP</option>
								<option value="AM" <?php echo ($customer['state'] == 'AM') ? 'selected' : ''; ?>>AM</option>
								<option value="BA" <?php echo ($customer['state'] == 'BA') ? 'selected' : ''; ?>>BA</option>
								<option value="CE" <?php echo ($customer['state'] == 'CE') ? 'selected' : ''; ?>>CE</option>
								<option value="DF" <?php echo ($customer['state'] == 'DF') ? 'selected' : ''; ?>>DF</option>
								<option value="ES" <?php echo ($customer['state'] == 'ES') ? 'selected' : ''; ?>>ES</option>
								<option value="GO" <?php echo ($customer['state'] == 'GO') ? 'selected' : ''; ?>>GO</option>
								<option value="MA" <?php echo ($customer['state'] == 'MA') ? 'selected' : ''; ?>>MA</option>
								<option value="MT" <?php echo ($customer['state'] == 'MT') ? 'selected' : ''; ?>>MT</option>
								<option value="MS" <?php echo ($customer['state'] == 'MS') ? 'selected' : ''; ?>>MS</option>
								<option value="MG" <?php echo ($customer['state'] == 'MG') ? 'selected' : ''; ?>>MG</option>
								<option value="PA" <?php echo ($customer['state'] == 'PA') ? 'selected' : ''; ?>>PA</option>
								<option value="PB" <?php echo ($customer['state'] == 'PB') ? 'selected' : ''; ?>>PB</option>
								<option value="PR" <?php echo ($customer['state'] == 'PR') ? 'selected' : ''; ?>>PR</option>
								<option value="PE" <?php echo ($customer['state'] == 'PE') ? 'selected' : ''; ?>>PE</option>
								<option value="PI" <?php echo ($customer['state'] == 'PI') ? 'selected' : ''; ?>>PI</option>
								<option value="RJ" <?php echo ($customer['state'] == 'RJ') ? 'selected' : ''; ?>>RJ</option>
								<option value="RN" <?php echo ($customer['state'] == 'RN') ? 'selected' : ''; ?>>RN</option>
								<option value="RS" <?php echo ($customer['state'] == 'RS') ? 'selected' : ''; ?>>RS</option>
								<option value="RO" <?php echo ($customer['state'] == 'RO') ? 'selected' : ''; ?>>RO</option>
								<option value="RR" <?php echo ($customer['state'] == 'RR') ? 'selected' : ''; ?>>RR</option>
								<option value="SC" <?php echo ($customer['state'] == 'SC') ? 'selected' : ''; ?>>SC</option>
								<option value="SP" <?php echo ($customer['state'] == 'SP') ? 'selected' : ''; ?>>SP</option>
								<option value="SE" <?php echo ($customer['state'] == 'SE') ? 'selected' : ''; ?>>SE</option>
								<option value="TO" <?php echo ($customer['state'] == 'TO') ? 'selected' : ''; ?>>TO</option>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="campo3">Inscrição Estadual</label>
							<input type="text" class="form-control" name="customer[ie]" value="<?php echo $customer['ie']; ?>">
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