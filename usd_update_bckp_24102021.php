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

              //$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
              //http://www.tcmb.gov.tr/kurlar/yyyyMM/ddMMyyyy.xml
              //$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/202110/19102021.xml');
              $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$yilay.'/'.$tarih.'.xml');
              $connect_='http://www.tcmb.gov.tr/kurlar/'.$yilay.'/'.$tarih.'.xml';
              echo '<br>';
              echo $connect_;

              //$usd_buying = $connect_web->Currency[0]->BanknoteBuying;
              $usd_selling = $connect_web->Currency[0]->BanknoteSelling;

              //$euro_buying = $connect_web->Currency[3]->BanknoteBuying;
              //$euro_selling = $connect_web->Currency[3]->BanknoteSelling;

              echo '<br>';
              // echo 'USD Alış: '.$usd_buying.'<br>USD Satış: '.$usd_selling.'<br>';
              // echo 'EUR Alış: '.$euro_buying.'<br>EUR Satış: '.$euro_selling;

              echo 'USD Satış: '.$usd_selling.'<br>';



              $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));

              $tsql = "SELECT [RemoteTime],[GunlukButceUsd],[GunlukGerceklesmeUsd]  FROM [TMX].[dbo].[Botas_EBT_Integration_cem] where RemoteTime between '".$tarih1."' and '".$tarih2."' order by RemoteTime";
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

              //düzenlenecek :::$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration_cem] SET GunlukButceUsd=ROUND('".$usd_degeri."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_degeri."', 4) where RemoteTime between '".$tarih1."' and '".$tarih2."'";
              //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration_cem] SET GunlukButceUsd=ROUND('".$usd_selling."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1."'";
              $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration_cem] SET GunlukButceUsd=ROUND('".$usd_selling."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults->execute();
              //$results = $getResults->fetchAll(PDO::FETCH_BOTH);
              //foreach($results as $row){

                //$sonuc = $row['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format(($row['Consumption']), 2, ',', '.').'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukButceSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukGerceklesmeSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                echo "<br>";
                //print $sonuc;
              //}
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
