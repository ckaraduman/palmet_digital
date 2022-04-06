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
    <h1>Palmet Dijital Belge Yönetim Uygulaması</h1>
    <h2>Ana Menü</h2>
    <br>
    <button style= "height:20px;width:250px" onclick="window.location.href='/gelen_evrak.php'">Gelen Yazışmalar</button>
	<br>
	<button style="position:relative;top:5px;height:20px;width:250px" onclick="window.location.href='/giden_evrak.php'">Giden Yazışmalar</button>
	<br>
	<button style="position:relative;top:10px;height:20px;width:250px" onclick="window.location.href='/evrak_ayar.php'">Ayarlar</button>
	<br>
	<button style="position:relative;top:15px;height:20px;width:250px" onclick="window.location.href='/raporlar.php'">Raporlar</button>
	<br>
	<button style="position:relative;top:20px;height:20px;width:250px" onclick="window.location.href='/admin.php'">Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
</html>
<?php
}
?>
