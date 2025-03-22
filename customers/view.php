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
			<div class="container-lg">
				<h2 class="mt-2">Cliente <?php echo $customer['id']; ?></h2>
				<hr>
				<dl class="dl-horizontal">
					<dt>Nome / Razão Social:</dt>
					<dd><?php echo $customer['name']; ?></dd>
					<dt>CPF / CNPJ:</dt>
					<dd><?php echo format_cpf_cnpj($customer['cpf_cnpj']); ?></dd>
					<dt>Data de Nascimento:</dt>
					<dd><?php echo formatadata($customer['birthdate'], "d/m/Y"); ?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Endereço:</dt>
					<dd><?php echo $customer['address']; ?></dd>
					<dt>Bairro:</dt>
					<dd><?php echo $customer['hood']; ?></dd>
					<dt>CEP:</dt>
					<dd><?php echo cep($customer['zip_code']); ?></dd>
					<dt>Data de Cadastro:</dt>
					<dd><?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?></dd>
					<dt>Data de Alteração:</dt>
					<dd><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Cidade:</dt>
					<dd><?php echo $customer['city']; ?></dd>
					<dt>Telefone:</dt>
					<dd><?php echo telefone($customer['phone']); ?></dd>
					<dt>Celular:</dt>
					<dd><?php echo telefone($customer['mobile']); ?></dd>
					<dt>UF:</dt>
					<dd><?php echo $customer['state']; ?></dd>
					<dt>Inscrição Estadual:</dt>
					<dd><?php echo number_format($customer['ie'], 0, ",", "."); ?></dd>
				</dl>
				<div id="actions" class="row mt-2">
					<div class="col-md-12">
						<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
					</div>
				</div>
			</div>
<?php include(FOOTER_TEMPLATE); ?>