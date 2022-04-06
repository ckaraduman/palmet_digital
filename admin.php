<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
$_GET = array_map(function($get){
return htmlspecialchars(trim($get));
},$_GET);
$_POST = array_map(function($post){
return htmlspecialchars(trim($post));
},$_POST);
//Security Code
include("ayar.php");
include("ayar2.php");
//ob_start();
//session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
  echo"<head>";
  echo"<h1>Palmet Dijital Yönetim Uygulaması</h1>";
  echo"<h2>Ana Menü</h2>";
  echo"<br>";
  echo"<button style= 'height:20px;width:250px' onclick=\"window.location.href='/evrak_index'\">Belge Yönetimi</button>";
	echo"<br>";
  echo"<button style='position:relative;top:5px;height:20px;width:250px' onclick=\"window.location.href='/lojistik_index'\">Satın Alma ve Lojistik Yönetimi</button>";
  echo"<br>";
	echo"<button style='position:relative;top:10px;height:20px;width:250px' onclick=\"window.location.href='/sikayet_index'\">Şikayetler</button>";
	echo"<br>";
	echo"<button style='position:relative;top:15px;height:20px;width:250px' onclick=\"window.location.href='/hakedis_index'\">Hakkediş Yönetimi</button>";
	echo"<br>";
	echo"<button style='position:relative;top:20px;height:20px;width:250px' onclick=\"window.location.href='/talep_index.php'\">Talepler</button>";
	echo"<br>";
	echo"<button style='position:relative;top:25px;height:20px;width:250px' onclick=\"window.location.href='/pp_index.php'\">Ön Ödemeli İşlemler</button>";
	echo"<br>";
	echo"<button style='position:relative;top:30px;height:20px;width:250px' onclick=\"window.location.href='/pcms_index.php'\">PCMS Kayıt Güncelleme Ekranı</button>";
  echo"<br>";
  echo"<button style='position:relative;top:35px;height:20px;width:250px' onclick=\"window.location.href='/hgf_index.php'\">HGF Veri Giriş Ekranı</button>";
  echo"<br>";
	echo"<button style='position:relative;top:40px;height:20px;width:250px' onclick=\"window.location.href='/logout.php'\">Güvenli Çıkış</button>";
	echo"<br><br><br>";
	echo"</head>";
	echo"<br>";
	echo"<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>";
    echo"<br><br>";
    echo $_SESSION["user"]."-".$_SESSION["region"];
}
?>
