<?php
	include("functions.php");
	session_start();
	index();
	include(HEADER_TEMPLATE); 
?>
			<div class="container-index-customers container-lg">
				<header class="mt-5">
					<div class="row">
						<div class="col-sm-6">
							<h2>Clientes</h2>
						</div>
						<div class="col-sm-6 text-end h2">
							<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
							<a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
						</div>
					</div>
				</header>
				<hr>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th width="30%">Nome</th>
								<th>CPF/CNPJ</th>
								<th>Telefone</th>
								<th>Atualizado em</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
							<tr>
								<td><?php echo $customer['id']; ?></td>
								<td><?php echo $customer['name']; ?></td>
								<td><?php echo format_cpf_cnpj($customer['cpf_cnpj']); ?></td>
								<td><?php echo telefone($customer['phone']); ?></td>
<?php $data = new Datetime ($customer['modified'],new DateTimeZone("America/Sao_Paulo")); ?>
								<td><?php echo formatadata($customer['modified'],"d/m/Y - H:i:s"); ?></td>
								<td class="actions text-right">
								<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
								<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
								<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
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
			</div>		
<?php 
	include("modal.php");
	include(FOOTER_TEMPLATE); 
?>