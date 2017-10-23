<?php
function encode_str($str){
  $z=& get_instance();


    $ciphertext = $z->encryption->encrypt($str);
    echo $ciphertext;

}

function decode_str($str){
  $z=& get_instance();

    $ciphertexts = $z->encryption->decrypt($str);
    echo $ciphertexts;
}
