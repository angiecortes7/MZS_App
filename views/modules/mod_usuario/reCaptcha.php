<?php
  if (isset($_POST["g-recaptcha-response"])&& $_POST["g-recaptcha-response"] ) {
      var_dump($_POST);
      $secret = "6LcrghkUAAAAANn7VYbw1Vue-N0a2vgx9oPO-3Cm";
      $ip = $_SERVER["REMOTE_ADDR"];

      $captcha = $_POST["g-recaptcha-response"];
      $result = file_get_contents("https://www.google.com/recaptcha/api/siteverifyfilename?secret=$secret&response=$captcha&remoteip=$ip");

      var_dump($result);
      $array = json_decode($result,TRUE);

      if ($array["sucess"]) {
        echo "Eres Humano";
      }else{
        echo "Eres Spam";
      }

  }

 ?>
