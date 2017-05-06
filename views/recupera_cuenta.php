<?php $response = $this->Umodel->readUserByToken($field) ?>
<section id="recuperarcontrasena">
<div class="container">
    <form id="contact" class="password" action="index.php?c=usuario&a=updatePassword" method="post" data-parsley-validate>
      <h3>Contraseña nueva</h3>
        <div class="input-field">
            <i class="fa fa-unlock-alt" aria-hidden="true"></i><input type="password" name="data[]" value="" required></i>
        </div>
        <div class="">
            <input type="hidden" readonly value="<?php echo $response['acce_token'];?>" name="data[]">
        </div>
        <div class="">
            <button class="hero-btn default" name="button">Modificar Contraseña</button>
            <p>Ingresa una contraseña nueva y así podrás volver a disfrutar lo que MyZoneScann te brinda.</p>

        </div>
    </form>
</div>
</section>
