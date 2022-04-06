<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
//Security Code 
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
    <h2>Dönemsel İşlemler Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a><br>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <button style= "position:relative;left:35;height:20px;width:150px" onclick="window.location.href='https://www.makroport.com/palmet/donemler.php'">Dönemler</button>
	<br>
	<button style="position:relative;top:5px;left:35px;height:20px;width:150px" onclick="window.location.href='https://www.makroport.com/palmet/yeni_donem.php'">Yeni Dönem</button>
	<br>
	<button style="position:relative;top:10px;left:35px;height:20px;width:150px" onclick="window.location.href='https://www.makroport.com/palmet/donemler.php'">Dönem Güncelle</button>
	<br>
	<button style="position:relative;top:15px;height:20px;width:220px" onclick="window.location.href='https://www.makroport.com/palmet/pp_index.php'">Ön Ödemeli Ana Menü</button>
	<br><br><br>
	</head>
<br>
<textarea name='metin_kutusu_1' rows='1' cols='40' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
</html>
<?php
}
?>
