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
	index();
	include(HEADER_TEMPLATE);
?>
			<!-- Index Usuários -->
			<div class="container-index-usuarios container-lg">
				<header class="mt-2">
					<div class="row">
						<div class="col-sm-6">
							<h2>Usuários</h2>
						</div>
						<div class="col-sm-6 text-end h2">
							<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
							<a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
						</div>
					</div>
				</header>
				<form name="filtro" action="index.php" method="post">
					<div class="row">
						<div class="form-group col-md-4">
							<div class="input-group mb-3">
								<input type="text" class="form-control" maxlength="50" name="user" placeholder="Pesquisar Usuário..." required>
								<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
							</div>
						</div>
					</div>
				</form>
				<hr>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th width="30%">Nome</th>
							<th>Usuário</th>
							<th>Foto</th>
							<th>Opções</th>
						</tr>
					</thead>
					<tbody>
<?php if ($usuarios) : ?>
<?php foreach ($usuarios as $usuario) : ?>
						<tr>
							<td><?php echo $usuario['id']; ?></td>
							<td><?php echo $usuario['nome']; ?></td>
							<td><?php echo $usuario['user']; ?></td>
							<td><?php
								if(!empty($usuario['foto'])){
									echo "<img src=\"fotos/{$usuario['foto']}\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"100px\">";
								}else{
									echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"100px\">";
								}
							?></td>
							<td class="actions text-right">
								<a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
								<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i> Editar</a>
								<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal-user" data-usuario="<?php echo $usuario['id']; ?>">
									<i class="fa fa-trash"></i> Excluir
								</a>
							</td>
						</tr>
<?php endforeach; ?>
<?php else : ?>
						<tr>
							<td colspan="6">Nenhum registro encontrado.</td>
						</tr>
<?php endif; ?>
					</tbody>
				</table>
			</div>
<?php include('modal.php');?>
<?php include(FOOTER_TEMPLATE); ?>