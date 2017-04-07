<?php $rol = $this->Rmodel->readRolByCode($field) ?>
<div class="container">
    <form class="col s8 offset-s2" action="?c=rol&a=updateData" method="post">
        <h1 class="center">MODIFICAR CATEGORIA</h1>
        <div class="row">
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Nombre</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $rol['rol_nombre']; ?>" >
            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Descripcion</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $rol['rol_descripcion']; ?>">
            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Fecha de creacion</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $rol['rol_fech_creacion']; ?>">
            </div>
            <input type="hidden" readonly value="<?php echo $rol['rol_codigo']; ?>" name="data[]">
        </div>
        <div class="row"></div>
        <div class="row center botones">
          <a class="btn btn-default" href="?c=rol" role="button">Atras </a>
          <button class="btn btn-default" type="submit" name="action">Actualizar</button>
        </div>
    </form>
</div>
