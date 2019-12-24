<?php
  require_once 'config.php';
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($baglanti, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);
    $tmp_name;
  	$sql = "INSERT INTO fotolar (foto_dosya, foto_isim) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($baglanti, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "<script type= 'text/javascript'>alert('Fotoğraf Kitaba Eklendi');window.location.href = 'admin.php';</script>";
  	}else{
  	echo "<script type= 'text/javascript'>alert('HATA');window.location.href = 'admin.php';</script>";
  	}
  }
  $result = mysqli_query($baglanti, "SELECT * FROM fotolar");
?>
