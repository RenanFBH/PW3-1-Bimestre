<?php
	include("../config.php");
	include(HEADER_TEMPLATE);
?>
			<div class="container-login">
				<div class="form-box login-page">
					<form action="valida.php" method="post">
						<br>
						<h1 class="titulo-login">Login</h1>
						<br>
						<div class="input-box">
							<input type="text" placeholder="Usuário" id="log" name="login" required>
							<i class="fa-solid fa-user col-1"></i>
						</div>
						<br>
						<div class="input-box">
							<input type="password" placeholder="Senha" id="pass" name="senha" required>
							<i class="fa-solid fa-lock col-1"></i>
						</div>
						<br>
						<div class="forgot-link">
							<a class="forgot-link" href="#">Esqueceu a Senha?</a>
						</div>
						<div class="button-group">
							<button type="submit" class="btn btn-secondary-login col-6">Entrar</button>
							<a href="<?php echo BASEURL; ?>" class="btn btn-secondary-login cancel col-6">Cancelar</a>  
						</div>		
					</form>
				</div>	
			</div>




			
<?php include(FOOTER_TEMPLATE); ?>