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
    <h2>Birim Fiyat Giriş Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hgf_index.php">HGF Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
    </div>

</html>
<?php

              if(isset($_POST["sorgula"])){
              $nokta_name = $_POST["nokta_name"];
              $tarih1 = $_POST["tarih1"];
              $tarih2 = $_POST["tarih2"];
              $birim_fiyat = $_POST["birim_fiyat"];


              if ((($nokta_name)=="seçim yapılmadı")||(empty($tarih1))||(empty($tarih2)))
              {
                echo "Değerlerin tamamı girilmelidir!";
              } else {


              echo '<br>';
              echo "<b>İlk Tarih : ".$tarih1."</b>";
              echo '<br>';
              echo "<b>Son Tarih : ".$tarih2."</b>";
              echo '<br>';
              echo "<b>Tüketim Noktası : ".$nokta_name."</b>";
              echo '<br>';
              echo "<b>Birim Fiyat : ".$birim_fiyat."</b>";
              echo '<br>';

              $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));

              $tsql = "SELECT [Name],[NoktaKodu],[RemoteTime],[Consumption],[GunlukButceCiro],[GunlukGerceklesmeCiro]  FROM [TMX].[dbo].[Botas_EBT_Integration] where Name='".$nokta_name."' and RemoteTime between '".$tarih1."' and '".$tarih2."' order by RemoteTime";
              //$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults->execute();
              $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              foreach($results as $row){

                $sonuc = $row['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format(($row['Consumption']), 2, ',', '.').'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukButceCiro'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukGerceklesmeCiro'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                echo "<br>";
                print $sonuc;
              }
              }
                }



              if(isset($_POST["guncelle"])){
              $nokta_name = $_POST["nokta_name"];
              $tarih1 = $_POST["tarih1"];
              $tarih2 = $_POST["tarih2"];
              $birim_fiyat = $_POST["birim_fiyat"];


              if ((($nokta_name)=="seçim yapılmadı")||(empty($tarih1))||(empty($tarih2))||(empty($birim_fiyat)))
              {
                echo "Değerlerin tamamı girilmelidir!";
              } else {


              echo '<br>';
              echo "<b>İlk Tarih : ".$tarih1."</b>";
              echo '<br>';
              echo "<b>Son Tarih : ".$tarih2."</b>";
              echo '<br>';
              echo "<b>Tüketim Noktası : ".$nokta_name."</b>";
              echo '<br>';
              echo "<b>Birim Fiyat : ".$birim_fiyat."</b>";
              echo '<br>';

              // $msql = "select NoktaKodu from [TMX].[dbo].[Points] where Name='".$nokta_name."'";
              // $getResults = $connect->prepare($msql);
              // $getResults->execute();
              // $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              // foreach($results as $row){
              // $nokta_kodu = $row['NoktaKodu'];
              // }
              $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));

              $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukButceCiro=ROUND('".$birim_fiyat."', 6), GunlukGerceklesmeCiro=ROUND('".$birim_fiyat."', 6) where Name='".$nokta_name."' and RemoteTime between '".$tarih1."' and '".$tarih2."'";
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
            }
?>
    <table border="1">
        <tr>
          <form method="post">
          <th>Tüketim Noktası</th><th>İlk Tarih</th><th>Son Tarih</th><th>Birim Fiyat</th>
        </tr>
          <tr></tr>
          <tr>
          <th>
          <select class="other1" name="nokta_name">
          <option value="seçim yapılmadı" selected>&nbsp;&nbsp;&nbsp;Tüketim Noktası Seçiniz&nbsp;&nbsp;&nbsp;</option>
          <?php
          $msql = "select Name from [TMX].[dbo].[Points]";
          $getResults = $connect->prepare($msql);
          $getResults->execute();
          $results = $getResults->fetchAll(PDO::FETCH_BOTH);
          foreach($results as $row){
            $liste = $row['Name'];
            print "<option value=\"$liste\">$liste</option>";
          }
          ?>
          </select>
        </th>
          <th><input type="date" name="tarih1"></th>
          <th><input type="date" name="tarih2"></th>
          <th><input type="double" class="value" id="birim_fiyat" name="birim_fiyat" align="right"></th>



          <br><br>
          </tr>
    </table>
    <br>
    <input type="submit" name="sorgula" id="sorgula" value="Sorgula">
    <input type="submit" name="guncelle" id="guncelle" value="Güncelle" onclick="return confirm('Güncelleme işlemine devam edilsin mi?')">
    <br><br>
    </form>

    <style type="text/css">

    #birim_fiyat{
        text-align: right;
    }


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
