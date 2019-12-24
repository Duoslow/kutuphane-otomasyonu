<?php
include('templates/main.php');
require_once("config.php");
?>
<div class="kutuphane kul-baslik">
  <form action="" method="post" class="kuldetay">
    <div>
      <span>
        Kullanıcı:
      </span>
      <span>
        <select name="okur_id">
        <?php
                  $sqli = "SELECT * FROM okurlar";
                  $result = mysqli_query($baglanti, $sqli);
                   while ($row = mysqli_fetch_array($result)) {
                    echo '<option value='.$row['id'].'>'.$row['okur_ismi'].'</option>';
                   }
          ?>
        </select>
      </span>
    </div>
    <div>
      <span>Şifre:</span>
      <span>
        <input type="password" value="şifre gir" name="okur_sifre">
      </span>
    </div>
    <div>
      <br>
      <span>
        <input type="submit" value="giriş" name="giris">
      </span>
    </div>
  </form>
</div>
<?php
if (isset($_POST['giris'])) {
  $sifre = "SELECT okur_sifre, id FROM okurlar";
  $sifreQuery = mysqli_query($baglanti, $sqli);
  while ($sifreFetch = mysqli_fetch_array($sifreQuery)) {
   if ($_POST['okur_id'] == $sifreFetch["id"]) {
     $sifre = $sifreFetch["okur_sifre"];
   }
  }
  if (password_verify($_POST['okur_sifre'], $sifre)) {
    $_SESSION["kullanici"] = $_POST["okur_id"];
    header('LOCATION:index.php');
  }
}
?>
<?php
include('templates/bottom.php');
?>
