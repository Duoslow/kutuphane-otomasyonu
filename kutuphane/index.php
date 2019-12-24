<?php
include('templates/main.php');
echo "<div class='kutuphane'>";
require_once("config.php");

#kitap sorgulama
$kitaplar = mysqli_query($baglanti, "SELECT * FROM kitaplar");
if ( $baglanti->affected_rows ){
  while( $kitapFetch = mysqli_fetch_array($kitaplar) ){
    echo "<div class='kitap-icerik'>";
    echo "<a href='#'>";
#foto sorgulama
$fotosorgu = mysqli_query($baglanti, "SELECT * FROM fotolar");
  while ($row = mysqli_fetch_array($fotosorgu)) {
    if ($kitapFetch["id"]==$row["foto_isim"]) {
    echo "<div style='background: url(/kutuphane/images/".$row['foto_dosya'].")' class='arka'></div>";
  }}
    echo "</a>";
    echo "<div>";
echo "<span><a href='#'>".$kitapFetch["kitap_adi"]."</a></span>";
#yazar sorgu
$kitapYazar = $kitapFetch["yazar_id"];
$yazarSorgu = mysqli_query($baglanti, "SELECT * FROM yazarlar WHERE id='$kitapYazar'");
$yazarFetch = mysqli_fetch_array($yazarSorgu);
echo "<span><span>Yazar:</span> ".$yazarFetch["yazar_ismi"]."</span>";
#yazar sorgu SON
#kategori sorgu
$kategorisorgu = mysqli_query($baglanti, "SELECT * FROM kategori");
  while ($row = mysqli_fetch_array($kategorisorgu)) {
    if ($kitapFetch["kategori_id"]==$row["id"]) {
    echo "<span><span>Tür:</span> ".$row['kategori_ismi']."</span>";
  }}
#kategori sorgu SON
#yayınevi sorgu
$kitapYayinevi = $kitapFetch["yayinevi_id"];
$yayinevSorgu = mysqli_query($baglanti, "SELECT * FROM yayin_evleri WHERE id='$kitapYayinevi'");
$yayinevFetch = mysqli_fetch_array($yayinevSorgu);
echo "<span><span>Yayınevi:</span> ".$yayinevFetch["yayinev_ismi"]."</span>";
#yayınevi sorgu SON
#yayın tarihi sorgu
echo "<span><span>Yayın Tarih:</span> ".$kitapFetch["yayin_tarihi"]."</span>";
#yayın taerihi sorgu SON
echo "</div>";
echo "</div>";
}}
include('templates/bottom.php');
 ?>
