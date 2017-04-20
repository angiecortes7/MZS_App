<?php $response = $this->Umodel->readUserByToken($field) ?>
<section id="recuperarcontrasena">
<div class="container">
    <form id="contact" class="password" action="index.php?c=usuario&a=updatePassword" method="post">
      <h3>Contraseña nuevah</h3>
        <div class="input-field">
            <i class="fa fa-envelope" aria-hidden="true"></i><input type="password" name="data[]" value="" required>
        </div>
        <div class="">
            <input type="hidden" readonly value="<?php echo $response['acce_token'];?>" name="data[]">
        </div>
        <div class="">
            <button class="hero-btn default" name="button">Modificar Contraseña</button>
        </div>
    </form>
</div>
</section>
