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
    <h2>Ön Ödemeli Müşteriler Listeleme Ekranı</h2>
    
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="on_odemeli_menu.php">Ön Ödemeli Müşteriler Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
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
            $sql = "select * from kit";
            $res=mysqli_query($conn,$sql);
            $numrows = mysqli_num_rows($res);
            echo "<br>";
            echo "<b>Toplam Kayıt Sayısı : ".$numrows."</b>";
            echo "<br><br><table  border=1>";
            echo "<tr>";
            echo "<th>Sözleşme No</th><th>Müşteri</th><th>Mekanik Endeks</th><th>Kit Endeksi<th>Kalan</th><th>Kalan (sm3)</th><th>Dönem Tüketimi</th></th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td width='100' align='center'>";    
        echo $row["oom_soz_no"];
        echo "</td>";
        echo "<td width='460'>";
        echo $row["oo_musteri"];
        echo "</td>";
        echo "<td width='80' align='center'><a href='sil.php?id=".$row['oom_id']."' onclick='return uyari();'>Sil</a>";
        echo "</td>";
        echo "</td>";
        echo "<td width='100' align='center'><a href='guncelle1.php?aranan=".$row['oom_soz_no']."'>Güncelle</a>";
        echo "</td>";
        echo "</tr>";
            }
            mysqli_close($conn);
            }

echo "</table>";
echo "<br><br>";
}
?>

    <form action="arama.php" method="post">Müşteri&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="aranan">
    <input type="submit" value="Arama Yap"/></form>
    <form action="guncelle1.php" method="post">Sözleşme No&nbsp;&nbsp;&nbsp;<td><input type="text" name="aranan">
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