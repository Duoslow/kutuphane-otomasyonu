<?php
include('templates/main.php');
require_once("config.php");

 if($_SESSION['kullanici']){
 }
 else {
header('LOCATION:giris.php');
 }
?>

<div class="kutuphane kul-baslik">
  <form action="inserts.php" method="post" class="kuldetay">
    <div>
      <span>Kitap:</span>
      <span>
        <select name="kitap_id">
        <?php
                  require_once 'config.php';
                  $sqli = "SELECT * FROM kitaplar";
                  $result = mysqli_query($baglanti, $sqli);
                   while ($row = mysqli_fetch_array($result)) {
                    echo '<option value='.$row['id'].'>'.$row['kitap_adi'].'</option>';
                   }
          ?>
        </select>
      </span>
    </div>
    <!--
    <div>
      <span>Şifre:</span>
      <span>
        <input type="password" value="şifre gir" name="kul_pass">
      </span>
    </div>
  -->
    <div>
      <br>
      <span>
        <input type="submit" value="kitabı sahiplen" name="kitap_al">
      </span>
    </div>
  </form>
</div>



<?php
include('templates/bottom.php');
?>
