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
    <h1>Palmet Dijital</h1>
    <h2>Taşeron İşlemleri Menüsü</h2>
    <div id="menu">
    <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <br>
    </div>
    <br>
    <button style= "height:20px;width:220px" onclick="window.location.href='https://www.makroport.com/palmet/taseron_liste.php'">Taşeron Görüntüleme</button>
	<br>
	<button style="position:relative;top:5px;height:20px;width:220px" onclick="window.location.href='https://www.makroport.com/palmet/taseron_kayit.php'">Yeni Taşeron Kayıt</button>
	<br>
	<button style="position:relative;top:10px;height:20px;width:220px" onclick="window.location.href='https://www.makroport.com/palmet/hakedis_index.php'">Hakkediş Yönetimi Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>
</html>
<?php
}
?>