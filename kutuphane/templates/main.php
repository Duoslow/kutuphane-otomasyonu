<?php
session_start();
if(isset($_GET['logout'])) {
    $_SESSION['kullanici'] = '';
    header('LOCATION:index.php'); die();
}
?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="navbar-nav">
      <nav>
        <ul class="nav-bar">
          <li><a href="index.php">anasayfa</a></li>
          <li><a href="istatistik.php">istatistik</a></li>
          <li><a href="kayit.php">kayıt</a></li>
          <?php if($_SESSION['kullanici']==1000){
          echo '<li><a href="admin.php">admin</a></li>';
}
?>
          
          <?php if ($_SESSION) {
            if ($_SESSION["kullanici"]) {
              echo '<li><a href="kullanici.php">kütüphanem</a></li>';
            }
          } ?>
          <?php
           if($_SESSION['kullanici']){
            
            echo'<li class="sag-nav"><a id="login" class="login"  href="?logout=1" name="login-link">çıkış</a></li>';
           }
           else {
           echo' 	<li class="sag-nav"><a id="login" class="login" href="giris.php" onclick="button(this)" name="login-link">GİRİŞ</a></li>';
           }
           ?>
        </ul>
      </nav>
    </div>
    <div class="icerik">
