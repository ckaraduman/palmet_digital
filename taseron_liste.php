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
    <h1>Palmet Dijital Hakkediş Yönetim Uygulaması</h1>
    <h2>Taşeron Listeleme Ekranı</h2>
    
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hakedis_index.php">Hakkediş Yönetimi Ana Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
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
            $sql = "select * from taseron";
            $res=mysqli_query($conn,$sql);
            $numrows = mysqli_num_rows($res);
            echo "<br>";
            echo "<b>Toplam Kayıt Sayısı : ".$numrows."</b>";
            echo "<br><br><table  border=1>";
            echo "<tr>";
            echo "<th>Taşeron No</th><th>Taşeron</th><th>İşlem</th><th>İşlem</th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td width='100' align='center'>";    
        echo $row["taseron_id"];
        echo "</td>";
        echo "<td width='460'>";
        echo $row["taseron"];
        echo "</td>";
        echo "<td width='80' align='center'><a href='sil.php?id=".$row['taseron_id']."' onclick='return uyari();'>Sil</a>";
        echo "</td>";
        echo "</td>";
        echo "<td width='100' align='center'><a href='guncelle1.php?aranan=".$row['taseron']."'>Güncelle</a>";
        echo "</td>";
        echo "</tr>";
            }
            mysqli_close($conn);
            }

echo "</table>";
echo "<br><br>";
}
?>

    <form action="taseron_arama.php" method="post">Taşeron&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="aranan">
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
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>

    <script language="JavaScript">
    function uyari() {
 
    if (confirm("Bu kaydı silmek istediğinize emin misiniz?"))
   return true;
    else 
   return false;
    }
    </script>