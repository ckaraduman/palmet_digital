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
    <h2>Raporlar Ekranı</h2>
    
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <br>
    <form method="post" action="raporlar1.php"><input type="submit" name="premac" id="premac" value="Ön Ödemeli Müşteri Listesi" style="width:250px"></form>
    <form method="post" action="raporlar2.php"><input type="submit" name="premac" id="premac" value="Dönem Tüketim Bilgileri" style="position:relative;top:-10px;height:20px;width:250px"></form>
    
  <br><br>
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>


</html>
 
    <style type="text/css">
 
    #textarea1{
   resize:none;
   position: fixed;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 50px;
    padding:15px;
    }
    #menu{
      font-size: 14px;
      font-weight: bold;
      word-spacing:0px;
    }
    </style>
<?php
}
?>