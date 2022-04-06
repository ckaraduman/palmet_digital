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
    <h2>Yeni Tarih Ekleme - Kayıt Yapılandırma Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hgf_index.php">HGF Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
    </div>

</html>
<?php

              if(isset($_POST["sorgu"])){
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

              $tsql = "SELECT *  FROM [TMX].[dbo].[Botas_EBT_Integration] where RemoteTime between '".$tarih1."' and '".$tarih2."' order by RemoteTime";
              //$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults->execute();
              $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              foreach($results as $row){

                $sonuc = $row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['KurumAdi'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                echo "<br>";
                print $sonuc;
              }
              }
                }



              if(isset($_POST["ekle"])){
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

              $tarih3=date('Y-m-d', strtotime($tarih1. ' - 365 days'));
              $tarih4=date('Y-m-d', strtotime($tarih1. ' - 60 days'));

              echo "<b>Geçen Yıl Tarihi : ".$tarih3."</b>";
              echo '<br>';
              $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));
              while($tarih1 < $tarih2) {

                $tarih3=date('Y-m-d', strtotime($tarih1. ' - 365 days'));
                $tarih4=date('Y-m-d', strtotime($tarih1. ' - 60 days'));  

              $tsql1 = "SELECT * FROM [TMX].[dbo].[Points]";
              //$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql1);
              $getResults->execute();
              $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              foreach($results as $row){

                //Point Id loop-START
                $Id = $row['Id'];
                //echo $Id;
                //$Id=1;

                  //İkinci iç sorgu - START

                $tsql2 = "SELECT * FROM [TMX].[dbo].[Botas_EBT_Integration] where StId=".$Id." and RemoteTime='".$tarih3." 08:00:00.000'";
                //$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
                $getResults = $connect->prepare($tsql2);
                $getResults->execute();
                $results = $getResults->fetchAll(PDO::FETCH_BOTH);
                foreach($results as $row1){
                $KurumAdi = $row1['KurumAdi'];
                $KurumKodu = $row1['KurumKodu'];
                $NoktaKodu = $row1['NoktaKodu'];
                $Name = $row1['Name'];
                $Flow_Rate = 0;
                $Consumption = 0;
                $Temperature = 0;
                $Pressure = 0;
                $Ust_Isil_Deger = 0;
                $Energy_Kcal = 0;
                $Consumption_Period = $row1['Consumption_Period'];
                $Posted = 0;
                $Posting_Result = 'Hazir';
                $SerialNumber = $row1['SerialNumber'];
                $EName = $row1['EName'];
                If ($Id==1) {
                    $USTISIL = 9155;
                }else{
                    $USTISIL = 0;
                }
                If ($row1['Consumption']<10) {
                    $GunlukButceSm3 = $row1['GunlukButceSm3'];
                }else{
                    $GunlukButceSm3 = $row1['Consumption'];
                }
                $GunlukButceSkb = 0;
                $GunlukButceCiro = 0;
                $GunlukGerceklesmeSkb = 0;
                $GunlukGerceklesmeCiro = 0;
                $GunlukButceSkbUsd = $row1['GunlukButceSkbUsd'];
                $GunlukButceCiroUsd = $row1['GunlukButceCiroUsd'];
                $GunlukGerceklesmeSkbUsd = $row1['GunlukGerceklesmeSkbUsd'];
                $GunlukGerceklesmeCiroUsd = $row1['GunlukGerceklesmeCiroUsd'];
                // $GunlukButceUsd = 0;
                // $GunlukGerceklesmeUsd = 0;
                $Stage = $row1['Stage'];
                $State = $row1['State'];
                $StId = $row1['StId'];
                $Origin = $row1['Origin'];
                $Company = $row1['Company'];
                $Sector = $row1['Sector'];
                $Location = $row1['Location'];
                }

                  //İkinci iç sorgu - STOP




                  $RemoteTime = $tarih1." 08:00:00.000";

                  // echo "<br>";
                  // echo $Id;
                  // echo "<br>";
                  // echo $KurumAdi;
                  // echo "<br>";
                  // echo $KurumKodu;
                  // echo "<br>";
                  // echo $NoktaKodu;
                  // echo "<br>";
                  // echo $Name;
                  // echo "<br>";
                  // echo $RemoteTime;
                  // echo "<br>";
                  // echo $Flow_Rate;
                  // echo "<br>";
                  // echo $Consumption;
                  // echo "<br>";
                  // echo $Temperature;
                  // echo "<br>";
                  // echo $Pressure;
                  // echo "<br>";
                  // echo $Ust_Isil_Deger;
                  // echo "<br>";
                  // echo $Energy_Kcal;
                  // echo "<br>";
                  // echo $Consumption_Period;
                  // echo "<br>";
                  // echo $Posted;
                  // echo "<br>";
                  // echo $Posting_Result;
                  // echo "<br>";
                  // echo $SerialNumber;
                  // echo "<br>";
                  // echo $EName;
                  // echo "<br>";
                  // echo $USTISIL;
                  // echo "<br>";
                  // echo $GunlukButceSm3;
                  // echo "<br>";
                  // echo $GunlukButceSkb;
                  // echo "<br>";
                  // echo $GunlukButceCiro;
                  // echo "<br>";
                  // echo $GunlukGerceklesmeSkb;
                  // echo "<br>";
                  // echo $GunlukGerceklesmeCiro;
                  // echo "<br>";
                  // echo $GunlukButceSkbUsd;
                  // echo "<br>";
                  // echo $GunlukButceCiroUsd;
                  // echo "<br>";
                  // echo $GunlukGerceklesmeSkbUsd;
                  // echo "<br>";
                  // echo $GunlukGerceklesmeCiroUsd;
                  // echo "<br>";
                  // echo $GunlukButceUsd;
                  // echo "<br>";
                  // echo $GunlukGerceklesmeUsd;
                  // echo "<br>";
                  // echo $Stage;
                  // echo "<br>";
                  // echo $State;
                  // echo "<br>";
                  // echo $StId;
                  // echo "<br>";
                  // echo $Origin;
                  // echo "<br>";
                  // echo $Company;
                  // echo "<br>";
                  // echo $Sector;
                  // echo "<br>";
                  // echo $Location;
                  // echo "<br>";

                  //print $KurumAdi; $KurumKodu; $NoktaKodu; $Name; $Tarih1; $Tarih2;

                //------------------------------------------------------

                $tarih9 = $tarih1.' 08:00:00.000';

                $tsql = "INSERT INTO [TMX].[dbo].[Botas_EBT_Integration] (KurumAdi, KurumKodu, NoktaKodu, Name, RemoteTime, Flow_Rate, Consumption, Temperature, Pressure, Ust_Isil_Deger, Energy_Kcal, Consumption_Period, Posted, Posting_Result, SerialNumber, EName, USTISIL, GunlukButceSm3, GunlukButceSkb, GunlukButceCiro, GunlukGerceklesmeSkb, GunlukGerceklesmeCiro, Stage, State, StId, Origin, Company, Sector, Location) VALUES (N'".$KurumAdi."', N'".$KurumKodu."', (SELECT NoktaKodu from [TMX].[dbo].[Botas_EBT_Integration] where RemoteTime='".$tarih4." 08:00:00.000' and Name='".$Name."'), N'".$Name."', '".$tarih9."', '".$Flow_Rate."', '".$Consumption."', '".$Temperature."', '".$Pressure."', '".$Ust_Isil_Deger."', '".$Energy_Kcal."', '".$Consumption_Period."', '".$Posted."', '".$Posting_Result."', '".$SerialNumber."', '".$EName."', '".$USTISIL."', '".$GunlukButceSm3."', '".$GunlukButceSkb."', '".$GunlukButceCiro."', '".$GunlukGerceklesmeSkb."', '".$GunlukGerceklesmeCiro."', '".$Stage."', '".$State."', '".$StId."', '".$Origin."', '".$Company."', '".$Sector."', '".$Location."')";


                // $tsql = "INSERT INTO [TMX].[dbo].[Botas_EBT_Integration_] (KurumAdi, KurumKodu, NoktaKodu, Name, RemoteTime, Flow_Rate, Consumption, Temperature, Pressure, Ust_Isil_Deger, Energy_Kcal, Consumption_Period, Posted, Posting_Result, SerialNumber, EName, USTISIL, GunlukButceSm3, GunlukButceSkb, GunlukButceCiro, GunlukGerceklesmeSkb, GunlukGerceklesmeCiro, GunlukButceUsd, GunlukGerceklesmeUsd, Stage, State, StId, Origin, Company, Sector, Location) VALUES (".$KurumAdi.", ".$KurumKodu.", ".$NoktaKodu.", ".$Name.", '".$tarih1." 08:00:00.000"."', ".$Flow_Rate.", ".$Consumption.", ".$Temperature.", ".$Pressure.", ".$Ust_Isil_Deger.", ".$Energy_Kcal.", ".$Consumption_Period.", ".$Posted.", ".$Posting_Result.", ".$SerialNumber.", ".$EName.", ".$USTISIL.", ".$GunlukButceSm3.", ".$GunlukButceSkb.", ".$GunlukButceCiro.", ".$GunlukGerceklesmeSkb.", ".$GunlukGerceklesmeCiro.", ".$GunlukButceUsd.", ".$GunlukGerceklesmeUsd.", ".$Stage.", ".$State.", ".$StId.", ".$Origin.", ".$Company.",
                // ".$Sector.", ".$Location.")";
                //

                echo $tsql;
                echo "<br>";



                // $tsql = "INSERT INTO [TMX].[dbo].[Botas_EBT_Integration_] (RemoteTime) VALUES (".$tarih1." 08:00:00.000)";
                // $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
                $getResults = $connect->prepare($tsql);
                $getResults->execute();
                ///echo "<br>";
                //------------------------------------------------------

              }
                $tarih1=date('Y-m-d', strtotime($tarih1. ' + 1 days'));

              //$sonuc = $row['Id'];
              //echo "<br>";
              //print $sonuc;

                //Point Id loop-STOP

              }

              Echo "İşlem Tamamlandı!";





              //--$tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));
              //--while($tarih1 < $tarih2) {
              //------------------------------------------------------
              ///$tsql = "INSERT INTO [TMX].[dbo].[Botas_EBT_Integration_] (RemoteTime) VALUES ('".$tarih1." 08:00:00.000')";
              //$tsql = "INSERT INTO [TMX].[dbo].[Botas_EBT_Integration_] (RemoteTime) VALUES (".$tarih1." 08:00:00.000)";
              //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_selling."', 4) where RemoteTime='".$tarih1." 08:00:00.000'";
              ///$getResults = $connect->prepare($tsql);
              ///$getResults->execute();
              //--echo "<br>";
              //------------------------------------------------------
              //--$tarih1=date('Y-m-d', strtotime($tarih1. ' + 1 days'));
            //--}


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

              if(isset($_POST["t_ekle"])){
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

                $tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration_] SET GunlukButceUsd=ROUND('".$usd_degeri."', 4), GunlukGerceklesmeUsd=ROUND('".$usd_degeri."', 4) where RemoteTime='".$ttarih." 08:00:00.000'";
                //$tsql = "UPDATE [TMX].[dbo].[Botas_EBT_Integration] SET GunlukGerceklesmeUsd=ROUND('".$usd_degeri."', 4) where RemoteTime='".$ttarih." 08:00:00.000'";
                $getResults = $connect->prepare($tsql);
                $getResults->execute();
                echo "<br>";
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
    <input type="submit" name="sorgu" id="sorgula" value="Sorgula">
    <input type="submit" name="ekle" id="ekle" value="Ekle" onclick="return confirm('Ekleme işlemi yapılsın mı?')">
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
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2022</textarea>
