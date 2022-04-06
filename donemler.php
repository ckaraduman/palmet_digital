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
    <h2>Dönemler Listesi Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="donemsel.php">Dönemsel İşlemler Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
    </div>
    <!-- <div id="icerik">

        <?php
        /*
        $sayfa=@$_GET["sayfa"];
        switch($sayfa){
            case "ekle";
            include("ekle.php");
            break;
        }
        */
    ?>

    </div>
    <br><br>
     -->


</html>
<?php

            if(isset($_POST["premac"])){
            $sql = "select * from kit_donemsel";
            $res=mysqli_query($conn,$sql);
            echo "<table  border='1>";
            echo "<tr'>";
            echo "<th>Dönem Kodu</th><th>Dönem Adı</th><th>İşlem</th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($res)) {
echo "<tr>";
echo "<td width='150'>";
echo $row["donem_kodu"];
echo "</td>";
echo "<td width='400'>";
echo $row["donem_adi"];
echo "</td>";
echo "<td width='80' align='center'><a href='donem_sil.php?id=".$row['donem_id']."' onclick='return uyari();'>Sil</a>";
echo "</td>";
echo "</tr>";
            }
            mysqli_close($conn);
            }

echo "</table>";
echo "<br><br>";
}
?>

    <form action="donem_guncelle.php" method="post">Dönem Kodu&nbsp;&nbsp;&nbsp;<td><input type="text" name="aranan">
    <input type="submit" value="Arama Yap"/></form>

    <br><br>

    <form method="post"><input type="submit" name="premac" id="premac" value="Tümünü Listele"></form>

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

    <script language="JavaScript">
    function uyari() {

    if (confirm("Bu kaydı silmek istediğinize emin misiniz?"))
   return true;
    else
   return false;
    }
    </script>
