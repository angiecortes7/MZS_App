<form method="post" action="?c=restaurante&a=create" >
	<div class="container">
        <div class="input-field col s6 offset-s3">
		  <h1 class="center ">Insertar Restaurante</h1>
			<div class="form">

			</div>
			<input type="text" class="form-control" id="name"  placeholder="Nombre" name="data[]" required>
			<input type="text" class="form-control" id="tel"  placeholder="Telefono" name="data[]" required>
			<input type="text" class="form-control" id="dir"  placeholder="Direccionn" name="data[]" required>
			<input type="text" class="form-control" id="hor"  placeholder="Horario" name="data[]" required>
			<input type="number" class="form-control" id="img"  placeholder="Cantidad de mesas" name="data[]" required>
		    <div class="center">
					<a class="btn btn-default" href="?c=restaurante" role="button">Atras </a>
					<button class="btn btn-default" type="submit">Guardar</button>

			</div>
		</div>
	</div>
</form>
