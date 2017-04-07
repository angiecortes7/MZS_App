<form method="post" action="?c=rol&a=create" >
	<div class="container">
        <div class="input-field col s6 offset-s3">
				<h1 class="center ">Insertar Rol</h1>
				<div class="form">
					<input type="text" class="form-control" id="img"  placeholder="Nombre" name="data[]" required>
					<textarea class="form-control" rows="3" placeholder="Descripcion" name="data[]" required></textarea>
					<p>Fecha de creacion</p>
					<input type="date" class="form-control" id="fech"  placeholder="Fecha de creacion" name="data[]" required>
					<div class="center">
				</div>
				<a class="btn btn-default" href="?c=rol" role="button">Atras </a>
				<button class="btn btn-default" type="submit">Guardar</button>
			</div>
		</div>
	</div>
</form>
