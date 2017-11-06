<?php

function ref_otomatis($href){ // nge direct otomatis
  echo "<script>window.location.href='".site_url($href)."'</script>";
}
function ref_pesan($pesan,$href){ // nge direct otomatis pake alert
  echo "<script>alert('".$pesan."');window.location.href='".site_url($href)."'</script>";
}
function num_format($angka){
  echo "Rp. ".number_format($angka,2,".",","); // format penulisan di indonesia, klo ndak salah sih
}
function ency($string){ // encrypt url
  /*
  $z = & get_instance();
  $z->encryption->initialize(
        array(
                'driver' => 'openssl',
                'cipher' => 'des',
                'mode' => 'cbc',
        )
);
  return $ecy= $z->encryption->encrypt($string);
*/
  return $string;
}
function decr($string){ // nge decrypt url
  /*
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
  */
  return $string;
}
function del_chara($string){ // buat hilangin . saat input harga
  return str_replace(".","",$string);
}
function ambil($name){ // pengganti $this->input->post, biar gampang
  $z = & get_instance();
  return $z->input->post($name);
}
function hash_pass($pass){
  return password_hash($pass,PASSWORD_BCRYPT);
}
function random_chara($prefix){
  return "$prefix".rand(0,30233/6555*973533);
}
function unset_sesi($sesi){
  $r=explode(",",$sesi);
  $z = & get_instance();
  return $z->session->unset_userdata($r);
}
