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
function decr($string){ // nge decrypt url
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
function del_chara($string){ // buat hilangin . saat input harga
  echo preg_replace(".",$string);
}
function ambil($name){ // pengganti $this->input->post, biar gampang
  $z = & get_instance();
  return $z->input->post($name);
}
