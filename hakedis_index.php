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
    <h1>Palmet Dijital Belge Yönetim Uygulaması</h1>
    <h2>Hakkediş Yönetim Menüsü</h2>
    <br>
    <button style= "height:20px;width:250px" onclick="window.location.href='https://www.makroport.com/palmet/taseronlar.php'">Taşeron Kayıtları</button>
	<br>
	<button style="position:relative;top:5px;height:20px;width:250px" onclick="window.location.href='https://www.makroport.com/palmet/hakedis_menu.php'">Dönemsel İşlemler</button>
	<br>
	<button style="position:relative;top:10px;height:20px;width:250px" onclick="window.location.href='https://www.makroport.com/palmet/hakedis_form.php'">Hakkediş Formları</button>
	<br>
	<button style="position:relative;top:15px;height:20px;width:250px" onclick="window.location.href='https://www.makroport.com/palmet/hakedis_raporlar.php'">Hakkediş Raporları</button>
	<br>
	<button style="position:relative;top:20px;height:20px;width:250px" onclick="window.location.href='https://www.makroport.com/palmet/admin.php'">Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
</html>
<?php
}
?>