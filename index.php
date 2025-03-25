<?php 
include "config.php"; 
include DBAPI; 
if (!isset($_SESSION)) session_start();
include(HEADER_TEMPLATE); 

$erro = "";

try {
    $db = open_database();
} catch (Exception $e) {
    $erro = $e->getMessage();
}
?>
<?php if ($db) : ?>
<?php if (!empty($_SESSION["message"])) : ?>
			<div class="container-index container-lg vh-100">
				<div class="alert alert-<?php echo $_SESSION["type"]; ?> alert-dismissible" role="alert" id="actions">
					<p><?php echo $_SESSION["message"]; ?></p>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
				</div>  
				<a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
			</div>
<?php else : ?>
			<div class="container-index d-flex justify-content-center align-items-center">
				<div class="row w-100 justify-content-center cards">
					<!-- Clientes -->
					<div class="col-lg-4 col-12 d-flex flex-column align-items-center">
						<a href="customers/add.php" class="card shadow ms-lg-5 mb-3 justify-content-center align-items-center text-decoration-none">
							<div class="row text-2">
								<div class="col-12 text-center">
									<i class="fa-solid fa-user-plus fa-5x mt-4 mb-4"></i>
								</div>
								<div class="col-12 text-center mb-2">
									<h5>Novo Cliente</h5>
								</div>
							</div>
						</a>
						<a href="customers" class="card shadow ms-lg-5 mb-3 justify-content-center align-items-center text-decoration-none">
							<div class="row text-2">
								<div class="col-12 text-center">
									<i class="fa-solid fa-users fa-5x mt-4 mb-4"></i>
								</div>
								<div class="col-12 text-center mb-2">
									<h5>Clientes</h5>
								</div>
							</div>
						</a>
					</div>
					<!-- Gerentes -->
					<div class="col-lg-4 col-12 d-flex flex-column align-items-center">
						<a href="gerentes/add.php" class="card shadow mb-3 justify-content-center align-items-center text-decoration-none">
							<div class="row text-2">
								<div class="col-12 text-center">
									<i class="fa-solid fa-user-plus fa-5x mt-4 mb-4"></i>
								</div>
								<div class="col-12 text-center mb-2">
									<h5>Novo Gerente</h5>
								</div>
							</div>
						</a>
						<a href="gerentes" class="card shadow mb-3 justify-content-center align-items-center text-decoration-none">
							<div class="row text-2">
								<div class="col-12 text-center">
									<i class="fa-solid fa-users fa-5x mt-4 mb-4"></i>
								</div>
								<div class="col-12 text-center mb-2">
									<h5>Gerentes</h5>
								</div>
							</div>
						</a>
					</div>
<?php if (isset($_SESSION["user"])) : ?>
<?php if ($_SESSION["user"] == "admin") : ?>
                    <!-- Usuários -->
                    <div class="col-lg-4 col-12 d-flex flex-column align-items-center">
                        <a href="usuarios/add.php" class="card shadow me-lg-5 mb-3 justify-content-center align-items-center text-decoration-none">
                            <div class="row text-2">
                                <div class="col-12 text-center">
                                    <i class="fa-solid fa-user-gear fa-5x mt-4 mb-4"></i>
                                </div>
                                <div class="col-12 text-center mb-2">
                                    <h5>Novo Usuário</h5>
                                </div>
                            </div>
                        </a>
                        <a href="usuarios" class="card shadow me-lg-5 mb-3 justify-content-center align-items-center text-decoration-none">
                            <div class="row text-2">
                                <div class="col-12 text-center">
                                    <i class="fa-solid fa-users-gear fa-5x mt-4 mb-4"></i>
                                </div>
                                <div class="col-12 text-center mb-2">
                                    <h5>Usuários</h5>
                                </div>
                            </div>
                        </a>
                    </div>
<?php endif; ?>
<?php endif; ?>
                </div>
            </div>
<?php endif; ?>
<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível conectar ao banco de dados!</p>
    </div>
<?php endif; ?>
<?php clear_messages(); ?>  
<?php include(FOOTER_TEMPLATE); ?>