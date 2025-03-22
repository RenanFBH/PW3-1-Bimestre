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
	index();
	include(HEADER_TEMPLATE); 
?>
			<!-- Index Gerentes -->
			<div class="container-index-gerentes container-lg">
				<header class="mt-5">
					<div class="row">
						<div class="col-sm-6">
							<h2>Gerentes</h2>
						</div>
						<div class="col-sm-6 text-end">
							<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Gerente</a>
							<a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
						</div>
						<form name="filtro" action="index.php" method="post">
							<div class="row">
								<div class="form-group col-md-4">
									<div class="input-group mb-3">
										<input type="text" class="form-control" maxlength="50" name="nome" placeholder="Pesquisar Gerente..." required>
										<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</header>
				<hr>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Endereço</th>
								<th>Departamento</th>
								<th>Data de nascimento</th>
								<th>Foto</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>
<?php if ($gerentes) : ?>
<?php foreach ($gerentes as $gerente) : ?>
							<tr>
								<td><?php echo $gerente['id']; ?></td>
								<td><?php echo $gerente['nome']; ?></td>
								<td><?php echo $gerente['endereco']; ?></td>
								<td><?php echo $gerente['depto']; ?></td>
<?php $data = new Datetime ($gerente['datanasc'], new DateTimeZone("America/Sao_Paulo")); ?>
								<td><?php echo formatadata($gerente['datanasc'],"d/m/Y"); ?></td>
<?php $data = new Datetime ($gerente['modificacao'], new DateTimeZone("America/Sao_Paulo")); ?>
								<td><?php
									if(!empty($gerente['foto'])){
										echo "<img src=\"fotos/{$gerente['foto']}\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"100px\">";
									}else{
										echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"100px\">";
									}
								?></td>
								<td class="actions text-right">
									<a href="view.php?id=<?php echo $gerente['id']; ?>" class="btn btn-sm btn-dark col-12 mt-1"><i class="fa fa-eye"></i> Visualizar</a>
									<a href="edit.php?id=<?php echo $gerente['id']; ?>" class="btn btn-sm btn-secondary col-12 mt-1"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
									<a href="#" class="btn btn-sm btn-light col-12 mt-1" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $gerente['id']; ?>">
										<i class="fa fa-trash"></i> Excluir
									</a>
								</td>
							</tr>
<?php endforeach; ?>
<?php else : ?>
							<tr>
								<td colspan="12">Nenhum registro encontrado.</td>
							</tr>
<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
<?php 
	include("modal.php");
	include(FOOTER_TEMPLATE); 
?>