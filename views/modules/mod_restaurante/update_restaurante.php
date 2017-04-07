<?php $restaurante = $this->REmodel->readRestauranteByCode($field) ?>
<div class="container">
    <form class="col s8 offset-s2" action="?c=restaurante&a=updateData" method="post">
        <h1 class="center">MODIFICAR RESTAURANTE</h1>
        <div class="row">
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Nombre</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $restaurante['restau_nombre']; ?>">

            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Telefono</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $restaurante['restau_telefono']; ?>">


            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Direccion</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $restaurante['restau_direccion']; ?>">


            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Horarios</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $restaurante['restau_horario']; ?>">


            </div>
             <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Cantida de mesas</label>
                <input id="icon_prefix" type="number" class="form-control" name="data[]" value="<?php echo $restaurante['restau_cant_mesas']; ?>">


            </div>
            <input type="hidden" readonly value="<?php echo $restaurante['restau_codigo']; ?>" name="data[]">
        </div>
        <div class="row"></div>
        <div class="row center botones">
            <a class="btn btn-default" href="?c=restaurante" role="button">Atras </a>
      			<button class="btn btn-default" type="submit" name="action">Actualizar</button>
        </div>
    </form>
</div>
