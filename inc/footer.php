		</main> 
		<!-- Footer -->
		<footer class="footer-transparente footer-estilo">
			<br>
			<div class="row">
				<div class="col-4 text-center">
					<p class="txt-footer">&copy;2024 - <?php $data = new Datetime("now", new DateTimeZone("America/Sao_Paulo")); echo $data->format("Y"); ?>  - RENAN E GUSTAVO</p>			
				</div>
				<div class="col-4 text-center">
					<a class="link-footer" href="#" target="_blank">POLÍTICA DE PRIVACIDADE</a>
				</div>
				<div class="col-4 text-center">
					<a class="link-footer" href="#">FORNECEDORES</a>
				</div>
			</div>
			<br>
		</footer>
		<script src="<?php echo BASEURL; ?>js/jquery-3.7.1.js"></script>
		<script src="<?php echo BASEURL; ?>js/fontawesome/all.min.js"></script>
		<script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
		<script src="<?php echo BASEURL; ?>js/main.js"></script>
	</body>
</html>