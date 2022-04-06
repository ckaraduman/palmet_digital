<?php

include("ayar.php");
ob_start();
//session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
?>
<html>
	<head>
    <h1>Palmet HGF Veri Giriş ve Kayıt Güncelleme Uygulaması</h1>
    <h2>Ana Menü</h2>
    <br>
    <button style= "height:20px;width:250px" onclick="window.location.href='/skb_giris.php'">SKB Değerleri Girişi</button>
	<br>
	<button style="position:relative;top:5px;height:20px;width:250px" onclick="window.location.href='/birim_fiyat_giris.php'">Birim Fiyat Girişleri</button>
	<br>
	<button style="position:relative;top:10px;height:20px;width:250px" onclick="window.location.href='/usd_update.php'">USD Güncelleme Ekranı</button>
	<br>
	<button style="position:relative;top:15px;height:20px;width:250px" onclick="window.location.href='/deger.php'">Tüketim Değeri Sorgulama-Düzeltme</button>
	<br>
  <button style="position:relative;top:20px;height:20px;width:250px" onclick="window.location.href='/date_insert.php'">Yeni Tarih Ekleme</button>
	<br>
  <button style="position:relative;top:25px;height:20px;width:250px" onclick="window.location.href='/raporlar.php'">Raporlar</button>
	<br>
	<button style="position:relative;top:30px;height:20px;width:250px" onclick="window.location.href='/admin.php'">Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>
</html>
<?php
}
?>
