<?php 
 
include("ayar.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
?>
<html>
	<head>
    <h1>Palmet Ön Ödemeli Tüketim Uygulaması</h1>
    <h2>Ön Ödemeli Müşteriler Menüsü</h2>
    <div id="menu">
    <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <br>
    </div>
    <br>
    <button style= "height:20px;width:220px" onclick="window.location.href='https://www.makroport.com/palmet/on_odemeli.php'">Ön Ödemeli Müşteri Görüntüleme</button>
	<br>
	<button style="position:relative;top:5px;left:35px;height:20px;width:150px" onclick="window.location.href='https://www.makroport.com/palmet/yeni_kurum_kayit.php'">Yeni Kayıt</button>
	<br>
	<button style="position:relative;top:15px;height:20px;width:220px" onclick="window.location.href='https://www.makroport.com/palmet/evrak_index.php'">Belge Yönetimi Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
</html>
<?php
}
?>