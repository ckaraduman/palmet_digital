<html>
	<head>
    <h1>Palmet Ön Ödemeli Tüketim Uygulaması</h1>
    <h2>Ön Ödemeli Müşteriler Listeleme Ekranı</h2>

    <div id="menu">
    <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="yeni_kayit.php">Kayıt Ekle</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="kayitlar.php">Kayıt Listele</a>

    <br><br>
    </div>
</style>
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
 <br><br>
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
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
    $aranan = $_POST["aranan"];

    $sql = "select * from kit where oo_musteri LIKE '%$aranan%'";
    $res=mysqli_query($conn,$sql);

    while ($bul = mysqli_fetch_array($res)) {

    $bulunan = $bul['oo_musteri'];
        extract($bul);
        echo "<table border='1'><tr><td width='50px' align='center'>$oom_soz_no</td><td width='250px'>$oo_musteri</td></tr></table>";
    }
        mysqli_close($conn);
            }
?>
