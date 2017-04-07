<?php

// Generadores random de enteros, string y combinados

function randAlphanum($length){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomAlpha = '';

  for ($i = 0; $i < $length; $i++) {
       $randomAlpha .= $characters[rand(0, $charactersLength - 1)];
  }

  return $randomAlpha;
}

function randString($length){
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';

  for ($i = 0; $i < $length; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
  }

  return $randomString;
}


function randNumber($minlenght, $maxlength){
  $randomNumber = '';
  for ($i = 0; $i < $maxlength; $i++) {
       $randomNumber .= rand($minlenght, $maxlength);
  }

  return $randomNumber;
}
?>
