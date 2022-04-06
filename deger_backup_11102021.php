<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
//Security Code
include("ayar.php");
include("ayar2.php");
ob_start();
//session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
?>
<html>
	<head>
    <h1>Palmet Digital - HGF Uygulaması</h1>
    <h2>HGF Değer Sorgulama - Düzeltme Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hgf_index.php">HGF Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
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
            if(isset($_POST["bul"])){
              $tarih = $_POST["tarih"];
              $nokta_kodu = $_POST["nokta_kodu"];
              //$sorgu = $connect->prepare("select count(*) from Botas_EBT_Integration ");
              //$sorgu->execute();
              //$say = $sorgu->fetchColumn();

              $tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih." 08:00:00.000'";
              $tsql_c = "select count(*) from Botas_EBT_Integration where RemoteTime='".$tarih." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults_c = $connect->prepare($tsql_c);
                $getResults->execute();
                $getResults_c->execute();
                $say = $getResults_c->fetchColumn();
                $results = $getResults->fetchAll(PDO::FETCH_BOTH);
                echo '<br>';
                echo "<b>Veri Tarihi : ".$tarih."</b>";
                echo '<br>';
                echo "<b>Toplam Kayıt Sayısı : ".$say."</b>";
                echo '<br>';
                echo "<br><br><table  border=1>";
                echo "<tr>";
                echo "<th>Tüketim Noktası</th><th>Tüketim Değeri</th>";
                echo "</tr>";
                foreach($results as $row){
                //while ($row=mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td width='300'>";
                //echo $row["oom_soz_no"];
                echo $row["Name"];
                echo "</td>";
                echo "<td align='right'>";
                //echo $row["Consumption"];
                $con = $row["Consumption"];
                $consumption = number_format($con, 2, ',', '.');
                echo $consumption;
                echo "</td>";
                //echo "<td width='80' align='center'><a href='sil.php?id=".$row['oom_id']."' onclick='return uyari();'>Sil</a>";
                //echo "</td>";
                //echo "</td>";
                //echo "<td width='100' align='center'><a href='guncelle1.php?aranan=".$row['oom_soz_no']."'>Güncelle</a>";
                //echo "</td>";
                echo "</tr>";
                  //mysqli_close($conn);






                  }
                echo "</table>";
                }


            if(isset($_POST["premac"])){

              $sorgu = $connect->prepare("select count(*) from Points");
              $sorgu->execute();
              $say = $sorgu->fetchColumn();

              $tsql = "select * from Points";
              $getResults = $connect->prepare($tsql);
                $getResults->execute();
                $results = $getResults->fetchAll(PDO::FETCH_BOTH);


                foreach($results as $row){
                  echo $row[0].' '.$row[1];
                  echo '<br>';
                }



            echo "<br>";
            echo "<b>Toplam Kayıt Sayısı : ".$say."</b>";
            echo "<br><br><table  border=1>";
            echo "<tr>";
            echo "<th>Sözleşme No</th><th>Müşteri</th><th>Mekanik Endeks</th><th>Kit Endeksi<th>Kalan</th><th>Kalan (sm3)</th><th>Dönem Tüketimi</th></th>";
            echo "</tr>";
            //while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td width='100' align='center'>";
        //echo $row["oom_soz_no"];
        echo "</td>";
        echo "<td width='460'>";
        //echo $row["oo_musteri"];
        echo "</td>";
        //echo "<td width='80' align='center'><a href='sil.php?id=".$row['oom_id']."' onclick='return uyari();'>Sil</a>";
        echo "</td>";
        echo "</td>";
        //echo "<td width='100' align='center'><a href='guncelle1.php?aranan=".$row['oom_soz_no']."'>Güncelle</a>";
        echo "</td>";
        echo "</tr>";
            }
            //mysqli_close($conn);
            }

echo "</table>";
//echo "<br><br>";
//}
/*
?>

    <form action="arama.php" method="post">Müşteri&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="aranan">
    <input type="submit" value="Arama Yap"/></form>
    <form action="guncelle1.php" method="post">Sözleşme No&nbsp;&nbsp;&nbsp;<td><input type="text" name="aranan">
    <input type="submit" value="Arama Yap"/></form>

*/
?>
    <table><table  border=1>
        <tr>
          <form method="post">
          <th>&nbsp;Nokta Kodu&nbsp;&nbsp;&nbsp;&nbsp;</th><th><input type="text" name="nokta_kodu"></th>
          </tr>
          <th>Tarih</th><th><input type="string" name="tarih"></th>
          <br><br>
    </table>
    <br>
    <input type="submit" name="bul" id="bul" value="Kayıt Bul">
    <br><br>
    <input type="submit" name="premac" id="premac" value="Tümünü Listele">
    </form>

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
