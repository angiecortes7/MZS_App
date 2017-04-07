<?php $usuario = $this->Umodel->readUsuarioByCode($field) ?>
<div class="container">
    <form class="col s8 offset-s2" action="?c=usuario&a=updateData" method="post">
        <h1 class="center">MODIFICAR USUARIO</h1>
        <div class="row">
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Nombre Completo</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $usuario['usu_nombre_comp']; ?>" >
            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Fecha De Nacimiento</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $usuario['usu_fech_naci']; ?>">
            </div>
            <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Sexo</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $usuario['usu_sexo']; ?>">

                <div class="row"></div>
            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Telefono</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $usuario['usu_tel_cel']; ?>">
                <div class="row"></div>

            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">E-mail</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $usuario['usu_mail']; ?>">

            <div class="input-field col s6 offset-s3">
              <label for="icon_prefix">Rol Codigo</label>
                <input id="icon_prefix" type="text" class="form-control" name="data[]" value="<?php echo $usuario['rol_codigo']; ?>">
            </div>
            <input type="hidden" readonly value="<?php echo $usuario['usu_codigo']; ?>" name="data[]">
        </div>
        <div class="row"></div>
        <div class="row center botones">
          <a class="btn btn-default" href="?c=usuario" role="button">Atras </a>
          <button class="btn btn-default" type="submit" name="action">Actualizar</button>
        </div>
    </form>
</div>
