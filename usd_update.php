<?php

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
    <h2>USD Kur Değeri Giriş Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hgf_index.php">HGF Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
    </div>

</html>
<?php

              if(isset($_POST["sorgula"])){
              $tarih1 = $_POST["tarih1"];
              $tarih2 = $_POST["tarih2"];


              if ((empty($tarih1))||(empty($tarih2)))
              {
                echo "Değerlerin tamamı girilmelidir!";
              } else {


              echo '<br>';
              echo "<b>İlk Tarih : ".$tarih1."</b>";
              echo '<br>';
              echo "<b>Son Tarih : ".$tarih2."</b>";
              echo '<br>';
              //echo date('d.m.Y H:i:s');
              $yilay=date('Y', StrToTime($tarih1)).date('m', StrToTime($tarih1));
              echo $yilay;
              echo '<br>';
              $tarih=date('d', StrToTime($tarih1)).date('m', StrToTime($tarih1)).date('Y', StrToTime($tarih1));
              echo $tarih;

              $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$yilay.'/'.$tarih.'.xml');

              echo '<br>';

              $usd_selling = $connect_web->Currency[0]->BanknoteSelling;

              echo '<br>';

              echo 'USD Satış: '.$usd_selling.'<br>';

              $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));

              $tsql = "SELECT [RemoteTime],[GunlukButceUsd],[GunlukGerceklesmeUsd]  FROM [TMX].[dbo].[Botas_EBT_Integration] where RemoteTime between '".$tarih1."' and '".$tarih2."' order by RemoteTime";
              //$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults->execute();
              $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              foreach($results as $row){

                $sonuc = $row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukButceUsd'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukGerceklesmeUsd'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                echo "<br>";
                print $sonuc;
              }
              }
                }



              if(isset($_POST["guncelle"])){
              $tarih1 = $_POST["tarih1"];
              $tarih2 = $_POST["tarih2"];

              if ((empty($tarih1))||(empty($tarih2)))
              {
                echo "Değerlerin tamamı girilmelidir!";
              } else {


              echo '<br>';
              echo "<b>İlk Tarih : ".$tarih1."</b>";
              echo '<br>';
              echo "<b>Son Tarih : ".$tarih2."</b>";
              echo '<br>';
              $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));
              while($tarih1 < $tarih2) {
              //------------------------------------------------------
              $gun=date('l', StrToTime($tarih1)); // Sırası gelen tarih hangi gün?
              echo $gun;
              echo '<br>';
              if ($gun==='Saturday')
              {
                echo "Cumartesi günü USD kur değeri gelmez!";
                //Cumartesi günü gelmeyen değer yerine bir önceki günün değeri alınıp Cumartesi gününe ait USD kur değeri olarak kayıt edilir
                $tarih_cumartesi=date('Y-m-d', strtotime($tarih1. ' - 1 days'));
                $yilay=date('Y', StrToTime($tarih_cumartesi)).date('m', StrToTime($tarih_cumartesi));
                echo $yilay;
                echo '<br>';
                $tarih=date('d', StrToTime($tarih_cumartesi)).date('m', StrToTime($tarih_cumartesi)).date('Y', StrToTime($tarih_cumartesi));
                echo $tarih;
                $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$yilay.'/'.$tarih.'.xml');
                echo '<br>';
                $usd_selling = $connect_web->Currency[0]->BanknoteSelling;
                echo '<br>';
                echo 'USD Satış: '.$usd_selling.'<br>';
                $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukButceUsd=ROUND('".$usd_selling."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
                //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
                $getResults = $connect->prepare($tsql);
                $getResults->execute();
                echo "<br>";

              } else {

                if ($gun==='Sunday')
                {
                  echo "Pazar günü USD kur değeri gelmez!";
                  //Cumartesi günü gelmeyen değer yerine bir önceki günün değeri alınıp Cumartesi gününe ait USD kur değeri olara kayıt edilir
                  $tarih_pazar=date('Y-m-d', strtotime($tarih1. ' - 2 days'));
                  $yilay=date('Y', StrToTime($tarih_cumartesi)).date('m', StrToTime($tarih_pazar));
                  echo $yilay;
                  echo '<br>';
                  $tarih=date('d', StrToTime($tarih_pazar)).date('m', StrToTime($tarih_pazar)).date('Y', StrToTime($tarih_pazar));
                  echo $tarih;
                  $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$yilay.'/'.$tarih.'.xml');
                  echo '<br>';
                  $usd_selling = $connect_web->Currency[0]->BanknoteSelling;
                  echo '<br>';
                  echo 'USD Satış: '.$usd_selling.'<br>';
                  $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukButceUsd=ROUND('".$usd_selling."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
                  //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
                  $getResults = $connect->prepare($tsql);
                  $getResults->execute();
                  echo "<br>";

                } else {

              $yilay=date('Y', StrToTime($tarih1)).date('m', StrToTime($tarih1));
              echo $yilay;
              echo '<br>';
              $tarih=date('d', StrToTime($tarih1)).date('m', StrToTime($tarih1)).date('Y', StrToTime($tarih1));
              echo $tarih;
              $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$yilay.'/'.$tarih.'.xml');
              echo '<br>';
              $usd_selling = $connect_web->Currency[0]->BanknoteSelling;
              echo '<br>';
              echo 'USD Satış: '.$usd_selling.'<br>';
              $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukButceUsd=ROUND('".$usd_selling."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
              //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults->execute();
              echo "<br>";
              //------------------------------------------------------
            }
          }
                $tarih1=date('Y-m-d', strtotime($tarih1. ' + 1 days'));
              }






              //düzenlenecek :::$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration_cem] SET GunlukButceUsd=ROUND('".$usd_degeri."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_degeri."', 4) where RemoteTime between '".$tarih1."' and '".$tarih2."'";
              //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration_cem] SET GunlukButceUsd=ROUND('".$usd_selling."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1."'";

              //$results = $getResults->fetchAll(PDO::FETCH_BOTH);
              //foreach($results as $row){

                //$sonuc = $row['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format(($row['Consumption']), 2, ',', '.').'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukButceSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukGerceklesmeSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;';

                //print $sonuc;
              //}
              }
                }
              //Tek Tarih USD Değer Güncelleme **********---------------************

              if(isset($_POST["tguncelle"])){
              $ttarih = $_POST["ttarih"];
              $usd_degeri = $_POST["usd_degeri"];

              if ((empty($ttarih))||(empty($usd_degeri)))
              {
                echo "Değerlerin tamamı girilmelidir!";
              } else {


              echo '<br>';
              echo "<b>Tarih : ".$ttarih."</b>";
              echo '<br>';
              echo "<b>USD Kur Değeri : ".$usd_degeri."</b>";
              echo '<br>';

                $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukButceUsd=ROUND('".$usd_degeri."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_degeri."', 4) where RemoteTime='".$ttarih." 08:00:00.000'";
                //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_degeri."', 4) where RemoteTime='".$ttarih." 08:00:00.000'";
                $getResults = $connect->prepare($tsql);
                $getResults->execute();
                echo "<br>";
            }
          }

              }

?>
    <table border="1">
        <tr>
          <form method="post">
          <th>İlk Tarih</th><th>Son Tarih</th>
        </tr>
          <tr></tr>
          <tr>
          <th><input type="date" name="tarih1"></th>
          <th><input type="date" name="tarih2"></th>
          <br><br>
          </tr>
    </table>
    <br>
    <input type="submit" name="sorgula" id="sorgula" value="Sorgula">
    <input type="submit" name="guncelle" id="guncelle" value="Güncelle" onclick="return confirm('Güncelleme işlemine devam edilsin mi?')">
    <br><br>
    </form>

    <!-- //Tek gün USD Kur Değeri Güncelleme Formu - ******************************** -->

    <table border="1">
        <tr>
          <form method="post">
          <th>Tarih</th><th>USD Kur Değeri</th>
        </tr>
          <tr></tr>
          <tr>
          <th><input type="date" name="ttarih"></th>
          <th><input type="double" class="value" id="usd_degeri" name="usd_degeri" align="right"></th>
          <br><br>
          </tr>
    </table>
    <br>
    <input type="submit" name="tguncelle" id="tguncelle" value="Güncelle" onclick="return confirm('Güncelleme işlemine devam edilsin mi?')">
    <br><br>
    </form>


    <style type="text/css">

    #usd_degeri{
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
