<?php $categoria = $this->Cmodel->readCategoriaByCode($field) ?>
<div class="container">
    <form class="col s8 offset-s2" action="?c=categoria&a=updateData" method="post">
        <h1 class="center">MODIFICAR CATEGORIA</h1>
        <div class="row">
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Nombre</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $categoria['categ_nombre']; ?>" >
            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">imagen</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $categoria['categ_imagen']; ?>">

            </div>
            <input type="hidden" readonly value="<?php echo $categoria['categ_codigo']; ?>" name="data[]">
        </div>
        <div class="row"></div>
        <div class="row center botones">
          <a class="btn btn-default" href="?c=restaurante" role="button">Atras </a>
          <button class="btn btn-default" type="submit" name="action">Actualizar</button>
        </div>
    </form>
</div>
