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
              $nokta_name = $_POST["nokta_name"];
              if (empty($nokta_name))
              {
                echo "Tüketim noktası seçilmedi!";

              //$sorgu = $connect->prepare("select count(*) from Botas_EBT_Integration ");
              //$sorgu->execute();
              //$say = $sorgu->fetchColumn();

              $tsql = "select * from [TMX].[dbo].[Botas_EBT_Integration] where Name='".$nokta_name."' and RemoteTime='".$tarih." 08:00:00.000'";
              $tsql_c = "select count(*) from [TMX].[dbo].[Botas_EBT_Integration] where Name='".$nokta_name."' and RemoteTime='".$tarih." 08:00:00.000'";
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
              } else // empty if bitişi

              {

              //$sorgu = $connect->prepare("select count(*) from Botas_EBT_Integration ");
              //$sorgu->execute();
              //$say = $sorgu->fetchColumn();

              $tsql = "select * from [TMX].[dbo].[Botas_EBT_Integration] where RemoteTime='".$tarih." 08:00:00.000' and Name='".$nokta_name."'";
              $tsql_c = "select count(*) from [TMX].[dbo].[Botas_EBT_Integration] where RemoteTime='".$tarih." 08:00:00.000' and Name='".$nokta_name."'";
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



                }

                if(isset($_POST["update"])){
                $nokta_name = $_POST["nokta_name"];
                $tarih = $_POST["tarih"];
                $consumption = $_POST["consumption"];

                echo $consumption;

                if ((($nokta_name)=="seçim yapılmadı")||(empty($tarih))||(empty($consumption)))
                {
                  echo '<br>';
                  echo "<b>Tarih : ".$tarih."</b>";
                  echo '<br>';
                  echo "<b>Tüketim Noktası : ".$nokta_name."</b>";
                  echo '<br>';
                  echo "<b>Tüketim Miktarı : ".$consumption."</b>";
                  echo '<br>';
                  echo "Değerlerin tamamı girilmelidir!";
                } else {


                echo '<br>';
                echo "<b>Tarih : ".$tarih."</b>";
                echo '<br>';
                echo "<b>Tüketim Noktası : ".$nokta_name."</b>";
                echo '<br>';
                echo "<b>Tüketim Miktarı : ".$consumption."</b>";
                echo '<br>';
                echo $consumption;

                $msql = "select Id from [TMX].[dbo].[Points] where Name='".$nokta_name."'";
                $getResults = $connect->prepare($msql);
                $getResults->execute();
                $results = $getResults->fetchAll(PDO::FETCH_BOTH);
                foreach($results as $row){
                $id = $row['Id'];
                echo $id;
                }

                $tsql = "update [TMX].[dbo].[Botas_EBT_Integration] set Consumption='".$consumption."' where StId=".$id." and RemoteTime='".$tarih." 08:00:00.000'";
                $getResults = $connect->prepare($tsql);
                $getResults->execute();
                // $results = $getResults->fetchAll(PDO::FETCH_BOTH);
                // foreach($results as $row){
                //
                //   //$sonuc = $row['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format(($row['Consumption']), 2, ',', '.').'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukButceSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukGerceklesmeSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                //   echo "<br>";
                //   //print $sonuc;
                // }
                }
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
    <table>
        <tr>
          <form method="post">
          <th><input type="date" name="tarih"></th>
        </tr>
          <tr></tr>
          <tr>
          <th>
          <select class="other1" name="nokta_name">
          <option value="seçim yapılmadı" selected>&nbsp;&nbsp;&nbsp;Tüketim Noktası Seçiniz&nbsp;&nbsp;&nbsp;</option>
          <?php
          //$sql = "select * Points";
          //$res=mysqli_query($conn,$sql);

          $msql = "select Name from [TMX].[dbo].[Points]";
          $getResults = $connect->prepare($msql);
          $getResults->execute();
          $results = $getResults->fetchAll(PDO::FETCH_BOTH);
          foreach($results as $row){
            $liste = $row['Name'];
            print "<option value=\"$liste\">$liste</option>";
          }


          //while ($row = mysqli_fetch_array($res))
          //{
          //$liste1 = $row['NoktaKodu'];
          //print "<option value=\"$liste1\">$liste1</option>";
          //};
          ?>
          </select>
        </th>
          </tr>
          <br><br>
    </table>
    <br>
    <input type="submit" name="bul" id="bul" value="Kayıt Bul">
    <br><br>
    <input type="bigint" class="value" id="consumption" name="consumption" align="right">
    <input type="submit" name="update" id="update" value="Kayıt Düzelt">
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
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>

    <script language="JavaScript">
    function uyari() {

    if (confirm("Bu kaydı silmek istediğinize emin misiniz?"))
   return true;
    else
   return false;
    }
    </script>
