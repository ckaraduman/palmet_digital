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
    <h1>Palmet PCMS V1 Veri Güncelleme Uygulaması</h1>
    <h2>Proje Durum Görüntüleme Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="pcms_index.php">Palmet PCMS V1 Veri Güncelleme Ana Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    </div>
    <br>


    <form action="proje_arama.php" method="post">Proje No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="proje_no">
    <input type="submit" value="Bul"/></form>

    <br><br>

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
 <br><br>
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>
</html>
<?php
}
?>
