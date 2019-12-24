<?php
include('templates/main.php');
require_once("config.php");
?>
<div class="kutuphane kul-baslik">
  <form action="inserts.php" method="post" class="kuldetay">
    <div>
      <span>
        Kullanıcı İsmi:
      </span>
      <span>
      <input type="text" name="okur_ismi"><br>
      </span>
    </div>
    <div>
      <span>Şifre:</span>
      <span>
        <input type="password" value="şifre gir" name="okur_sifre">
      </span>
    </div>

    <div>
      <span>Görevi:</span>
      <span>
        <input type="text" name="okur_görevi"><br>
      </span>
    </div>
    <div>
      <span>Birimi:</span>
      <span>
        <input type="text" name="okur_birim"><br>
      </span>
    </div>

    <div>
      <br>
      <span>
        <input type="submit" value="Kaydol" name="kayit">
      </span>
    </div>
  </form>
  <!-- AYRIM NOKTASI -->
</div>
<?php
include('templates/bottom.php');
?>
