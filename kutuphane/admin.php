<<?php
include('templates/main.php');
require_once("config.php");
if($_SESSION['kullanici']==1000){
}
else {
header('LOCATION:giris.php');
}
?>
<div class="kutuphane kul-baslik">

<div>
<form action="inserts.php" method="post" class="kuldetay">
<div><span>Kitap adi:</span> <span><input type="text" name="kitap_adi"></span></div>
<div><span>Kitap Kategorisi:</span><span> <select name="kategori_id">
<?php
          require_once 'config.php';
          $sqli = "SELECT * FROM kategori";
          $result = mysqli_query($baglanti, $sqli);
           while ($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['id'].'>'.$row['kategori_ismi'].'</option>';
           }
  ?>
</select></span></div>
<div>
<span>Yazarı:</span><span> <select name="yazar_id">
<?php
          require_once 'config.php';
          $sqli = "SELECT * FROM yazarlar";
          $result = mysqli_query($baglanti, $sqli);
           while ($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['id'].'>'.$row['yazar_ismi'].'</option>';
           }
  ?>
</select></span></div>
<div>
  <span>
yayin yeri:</span><span><select name="yayinevi_id">
<?php
          require_once 'config.php';
          $sqli = "SELECT * FROM yayin_evleri";
          $result = mysqli_query($baglanti, $sqli);
           while ($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['id'].'>'.$row['yayinev_ismi'].'</option>';
           }
  ?>
</select></span></div>
<div>
<span>yayin tarihi:</span><span> <input type="date" name="yayin_tarihi"></span></div>

<input type="submit" value="Kitap Ekle"  id="kitap" name="kitap">
</form>
</div>
<div>
<form action="inserts.php" method="post" class="kuldetay" align="left">
<div><span>Yazar ismi: </span><span><input type="text" name="yazar_ismi"></span></div>
<input type="submit" value="gönder" id="yazar" name="yazar">
</form>
</div>
<div>
<form action="inserts.php" method="post" class="kuldetay">

<div><span>kategori ismi: </span><span><input type="text" name="kategori_ismi"></span></div>
<input type="submit" value="gönder" id="kategori" name="kategori">
</form>
</div>
<div>
<form action="inserts.php" method="post" class="kuldetay">
<div><span>yayinevi ismi:</span><span> <input type="text" name="yayinev_ismi"></span></div>
<input type="submit" value="gönder" id="yayinevi" name="yayinevi">
</form>
</div>
<div>
<form method="POST" action="upload.php" enctype="multipart/form-data" class="kuldetay">
  <input type="hidden" name="size" value="1000000">
  <div>
    <input type="file" name="image">
  </div>
  <div>
    <select name="image_text">
      <?php
                require_once 'config.php';
                $sqli = "SELECT * FROM kitaplar";
                $result = mysqli_query($baglanti, $sqli);
                 while ($row = mysqli_fetch_array($result)) {
                  echo '<option value='.$row['id'].'>'.$row['kitap_adi'].'</option>';
                 }
        ?>
    </select>

  </div>
  <div>
    <button type="submit" name="upload">POST</button>
  </div>
</form>
</div>
</div>
<?php
include('templates/bottom.php');
 ?>
