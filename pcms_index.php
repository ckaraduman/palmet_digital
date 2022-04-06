<?php

include("ayar.php");
ob_start();
// session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
?>
<html>
	<head>
    <h1>Palmet PCMS V1 Veri Güncelleme Uygulaması</h1>
    <h2>Ana Menü</h2>
    <br>
    <button style= "height:20px;width:250px" onclick="window.location.href='/proje_durum.php'">Proje Durum Sorgulama</button>
	<br>
	<button style="position:relative;top:5px;height:20px;width:250px" onclick="window.location.href='/proje_degistir.php'">Proje Durum Değiştirme</button>
	<br>
	<button style="position:relative;top:10px;height:20px;width:250px" onclick="window.location.href='/evrak_ayar.php'">Ayarlar</button>
	<br>
	<button style="position:relative;top:15px;height:20px;width:250px" onclick="window.location.href='/raporlar.php'">Raporlar</button>
	<br>
	<button style="position:relative;top:20px;height:20px;width:250px" onclick="window.location.href='/admin.php'">Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>
</html>
<?php
}
?>
