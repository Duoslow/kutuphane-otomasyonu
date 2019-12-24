<?php
include('templates/main.php');
require_once("config.php");

$kuldetay_template = "
<div class=\"kuldetay\">
  <div>
    <span>Okur</span>
    <span>{okur}</span>
  </div>
  <div>
    <span>Aldığı Kitap</span>
    <span>{kitap}</span>
  </div>
  <div>
    <span>Alım Tarihi</span>
    <span>{tarih}</span>
  </div>
</div>
";
$yazardetay_template ="
<div class=\"kuldetay\">
  <div>
    <span>Yazar</span>
    <span>{yazar}</span>
  </div>
  <div>
    <span>Yayınevi</span>
    <span>{yayinev}</span>
  </div>
  <div>
    <span>Kitap</span>
    <span>{kitap}</span>
  </div>
</div>


";

// echo $newStr = str_replace('{kitap}', $kitap_adi, $kuldetay_template);

?>
<div class="kutuphane kul-baslik">
  <div>
    <form action="#" method="post" class="kuldetay">
      <div>
        <span>
          Kullanıcı:
        </span>
        <span>
          <select name="okur_id[]">
          <?php
                    require_once 'config.php';
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
        <br>
        <span>
          <input type="submit" value="göster" name="göster1">
        </span>
      </div>
    </form>
  </div>
  <!-- AYRIM NOKTASI -->
  <div>
    <form action="#" method="post" class="kuldetay">
      <div>
        <span>
          Yazar:
        </span>
        <span>
          <select name="yazar_id[]">
          <?php
                    require_once 'config.php';
                    $sqli = "SELECT * FROM yazarlar";
                    $result = mysqli_query($baglanti, $sqli);
                     while ($row = mysqli_fetch_array($result)) {
                      echo '<option value='.$row['id'].'>'.$row['yazar_ismi'].'</option>';
                     }
            ?>
          </select>
        </span>
      </div>
      
      <div>
        <br>
        <span>
          <input type="submit" value="yazarı göster" name="göster2">
        </span>
      </div>
    </form>
  </div>
</div>
<!--okur kitap alım çıktısı -->
<div class="kul-ana">
  <div class="kutuphane kul-kutuphane">
    <?php
if (isset($_POST['göster1'])) {
  foreach ($_POST['okur_id'] as $secim) {
    $kitaplar = mysqli_query($baglanti, "SELECT kitap_id, alim_tarihi FROM kitap_gecmisi WHERE okur_id=".$secim);
    while( $kitapFetch = mysqli_fetch_array($kitaplar) ){
      $okursorgu = mysqli_query($baglanti, "SELECT okur_ismi FROM okurlar WHERE id=".$secim);
        while ($row = mysqli_fetch_array($okursorgu)) {
          $kuldetay = str_replace('{okur}', $row['okur_ismi'], $kuldetay_template);
        }

      $kitapsorgu = mysqli_query($baglanti, "SELECT kitap_adi FROM kitaplar WHERE id=".$kitapFetch["kitap_id"]);
        while ($row = mysqli_fetch_array($kitapsorgu)) {
          $kuldetay = str_replace('{kitap}', $row["kitap_adi"], $kuldetay);
        }
      $kuldetay = str_replace('{tarih}', $kitapFetch["alim_tarihi"], $kuldetay);
      echo $kuldetay;
    }
  }
}
     ?>
  </div>

<!--yazar çıktısı -->
  <div class="kutuphane kul-kutuphane">

        <?php
        if (isset($_POST['göster2'])) {
          foreach ($_POST['yazar_id'] as $secim2) {
            $yazarlar = mysqli_query($baglanti, "SELECT kitap_adi, yayinevi_id FROM kitaplar WHERE yazar_id=".$secim2);
            while( $yazarFetch = mysqli_fetch_array($yazarlar) ){
              $okursorgu = mysqli_query($baglanti, "SELECT yazar_ismi FROM yazarlar WHERE id=".$secim2);
                while ($row = mysqli_fetch_array($okursorgu)) {
                  $yazardetay = str_replace('{yazar}', $row["yazar_ismi"], $yazardetay_template);
                }
              $yayinevSorgu = mysqli_query($baglanti, "SELECT yayinev_ismi FROM yayin_evleri WHERE id=".$yazarFetch["yayinevi_id"]);
                while ($row = mysqli_fetch_array($yayinevSorgu)) {
                  $yazardetay = str_replace('{yayinev}', $row["yayinev_ismi"], $yazardetay);
                }
              $yazardetay = str_replace('{kitap}', $yazarFetch["kitap_adi"], $yazardetay);
              echo $yazardetay;
            }
          }
        }
         ?>
  </div>
</div>


<?php
include('templates/bottom.php');
?>
