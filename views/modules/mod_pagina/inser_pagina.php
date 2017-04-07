<form method="post" action="?c=pagina&a=create" >
	<div class="container">
       	 <div class="input-field col s6 offset-s3">
			<h1 class="center ">Insertar Pagina</h1>
			<div class="form">
				<input type="text" class="form-control" id="nom"  placeholder="Nombre" name="data[]" required>
				<input type="text" class="form-control" id="menu"  placeholder="Menu" name="data[]" required>
				<input type="text" class="form-control" id="icono"  placeholder="Icono" name="data[]" required>
				<input type="text" class="form-control" id="sec"  placeholder="Seccion" name="data[]" required>
			</div>
				<div class="center">
					<a class="btn btn-default" href="?c=pagina" role="button">Atras </a>
					<button class="btn btn-default" type="submit">Guardar</button>

				</div>
		 </div>
	</div>
</form>
