<?php

function refresh_otomatis($href){
  echo "<script>window.location.href='".site_url($href)."'</script>";
}
function num_format($angka){
  echo "Rp. ".number_format($angka,2,".",","); // format penulisan di indonesia, klo ndak salah sih
}
function ency($string){
  $z = & get_instance();
  $z->encryption->initialize(
        array(
                'driver' => 'openssl',
                'cipher' => 'des',
                'mode' => 'cbc',
        )
);
  return $ecy= $z->encryption->encrypt($string);

}
function decr($string){
  $z = & get_instance();
  $z->encryption->initialize(
        array(
                'driver' => 'openssl',
                'cipher' => 'des',
                'mode' => 'cbc',
        )
      );
  return $dec= $z->encryption->decrypt($string);
  // ternyata harus direturn baru bisa
}
function del_chara($string){
  echo preg_replace(".",$string);
}
