
<?php
require_once 'config.php';
session_start();
if (isset($_POST["kategori"])) {

  $sql = "INSERT INTO kategori (kategori_ismi)
  VALUES ('".$_POST["kategori_ismi"]."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Yeni Kategori Eklendi');window.location.href = 'admin.php';</script>";
  }
  else {
  echo "<script type= 'text/javascript'>alert('Aynı Kategoriyi Ekleyemezsin');window.location.href = 'admin.php';</script>";
  }

  $baglanti->close();

}elseif (isset($_POST["yazar"])) {

  $sql = "INSERT INTO yazarlar (yazar_ismi)
  VALUES ('".$_POST["yazar_ismi"]."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Yeni Yazar Eklendi');window.location.href = 'admin.php';</script>";
  }
  else {
  echo "<script type= 'text/javascript'>alert('Aynı Yazarı Ekleyemezsin');window.location.href = 'admin.php';</script>";
  }

  $baglanti->close();


}elseif (isset($_POST["kullanici"])) {

  $sql = "INSERT INTO okurlar (okur_ismi, okur_gorevi, okur_birim)
  VALUES ('".$_POST["okur_ismi"]."','".$_POST["okur_görevi"]."','".$_POST["okur_birim"]."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Yeni Kullanici Eklendi');window.location.href = 'admin.php';</script>";
  }
  else {
  echo "<script type= 'text/javascript'>alert('Aynı Kullaniciyi Ekleyemezsin');window.location.href = 'admin.php';</script>";
  }

  $baglanti->close();

}elseif (isset($_POST["kitap"])) {

  $sql = "INSERT INTO kitaplar (kitap_adi, yazar_id, yayinevi_id, yayin_tarihi,kategori_id)
  VALUES ('".$_POST["kitap_adi"]."','".$_POST["yazar_id"]."','".$_POST["yayinevi_id"]."','".$_POST["yayin_tarihi"]."','".$_POST["kategori_id"]."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Yeni Kitap Eklendi');window.location.href = 'admin.php';</script>";
  }
   else {
  echo "<script type= 'text/javascript'>alert('Aynı Kitabi Ekleyemezsin');window.location.href = 'admin.php';</script>";
  }

  $baglanti->close();

}elseif (isset($_POST["yayinevi"])) {

  $sql = "INSERT INTO yayin_evleri (yayinev_ismi)
  VALUES ('".$_POST["yayinev_ismi"]."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Yeni Yayinevi Eklendi');window.location.href = 'admin.php';</script>";
  }
   else {
  echo "<script type= 'text/javascript'>alert('Aynı Yayinevini Ekleyemezsin');window.location.href = 'admin.php';</script>";
  }

  $baglanti->close();

}elseif (isset($_POST["kitap_al"])) {

  $sql = "INSERT INTO kitap_gecmisi (kitap_id,okur_id)
  VALUES ('".$_POST["kitap_id"]."','".$_SESSION["kullanici"]."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('kitap alındı');window.location.href = 'kullanici.php';</script>";
  }
   else {
  echo "<script type= 'text/javascript'>alert('Aynı Yayinevini Ekleyemezsin');window.location.href = 'kullanici.php';</script>";
  }

  $baglanti->close();

}elseif (isset($_POST["kayit"])) {

  $sql = "INSERT INTO okurlar (okur_ismi, okur_gorevi, okur_birim,okur_sifre)
  VALUES ('".$_POST["okur_ismi"]."','".$_POST["okur_görevi"]."','".$_POST["okur_birim"]."','".password_hash($_POST["okur_sifre"], PASSWORD_DEFAULT)."')";

  if ($baglanti->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Yeni Kullanici Eklendi');window.location.href = 'kayit.php';</script>";
  }
  else {
  echo "<script type= 'text/javascript'>alert('Aynı Kullaniciyi Ekleyemezsin');window.location.href = 'kayit.php';</script>";

  $baglanti->close();

}
}


 ?>
