
<?php
  require_once 'views/modules/mod_usuario/reCaptcha.php';
   ?>

<section id="mod_registro">
<div  class="container">
	<form id="contact" method="post" action="guardar_visitante" data-parsley-validate>
		<h2>Registrate</h2>
      <div class="input-field col s6 offset-s3">
					<i class="fa fa-user" aria-hidden="true"></i><input type="text" id="nombrer" class="validate"  placeholder="Nombre Completo" name="data[]" required>

					<i class="fa fa-envelope" aria-hidden="true"></i><input type="email" id="email" class="validate"  placeholder=" Correo electrónico " name="data[]" required>

          <i class="fa fa-unlock-alt" aria-hidden="true"></i><input  type="password" id="pass1r"  name="data[]" class="validate" placeholder="Contraseña" required>
					<i class="fa fa-unlock" aria-hidden="true"></i><input  type="password" id="pass2r" class="validate"  placeholder="Verificar Contraseña" required>
          <label for="verif"></label>
        </div>
        <div class="g-recaptcha" id="recapcha" data-sitekey="6LcrghkUAAAAAInKTj9B-5z16U6M_oUzZdhce_84"></div>
							<button type="submit" id="to-about-section" target="_self" class="hero-btn default">Registrarse</button>
				<select name="data[]">
                        <?php foreach ($this->Umodel->readRol() as $row) { ?>
                            <option value="<?php echo $row['rol_codigo']; ?>"><?php echo $row["rol_nombre"]; ?></option>
                        <?php } ?>
                    </select>

		</div>
	</div>
</form>
</section>
