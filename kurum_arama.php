<html>
	<head>
    <h1>Palmet Dijital Uygulaması</h1>
    <h2>Belge Yönetimi Kurumlar Listeleme Ekranı</h2>
    
    <div id="menu">
    <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="yeni_kurum_kayit.php">Kayıt Ekle</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="evrak_kurumlar.php">Kayıt Listele</a>
    
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
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>
<?php 
 
include("ayar.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
    $aranan = $_POST["aranan"];
   
    $sql = "select * from kurum where kurum LIKE '%$aranan%'";
    $res=mysqli_query($conn,$sql);
   
    while ($bul = mysqli_fetch_array($res)) {
    
    $bulunan = $bul['kurum'];
        extract($bul);
        echo "<table border='1'><tr><td width='50px' align='center'>$kurum_id</td><td width='250px'>$kurum</td></tr></table>";
    }
        mysqli_close($conn);
            }
?>
