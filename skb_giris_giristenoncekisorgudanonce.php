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
    <h2>SKB Değerleri Giriş Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hgf_index.php">HGF Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
    </div>

</html>
<?php

              if(isset($_POST["kaydet"])){
              $nokta_name = $_POST["nokta_name"];
              $tarih1 = $_POST["tarih1"];
              $tarih2 = $_POST["tarih2"];
              $skb = $_POST["skb"];


              if ((($nokta_name)=="seçim yapılmadı")||(empty($tarih1))||(empty($tarih2))||(empty($skb)))
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
              echo "<b>SKB Değeri : ".$skb."</b>";
              echo '<br>';

              $msql = "select NoktaKodu from Points where Name='".$nokta_name."'";
              $getResults = $connect->prepare($msql);
              $getResults->execute();
              $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              foreach($results as $row){
              $nokta_kodu = $row['NoktaKodu'];
              }


              $tsql = "SELECT [Name],[NoktaKodu],[RemoteTime],[Consumption],[GunlukButceSkb],[GunlukGerceklesmeSkb]  FROM [TMX].[dbo].[Botas_EBT_Integration_cem] where NoktaKodu='".$nokta_kodu."' and RemoteTime>='".$tarih1."' and RemoteTime<='".$tarih2."' order by RemoteTime";
              //$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
              $getResults = $connect->prepare($tsql);
              $getResults->execute();
              $results = $getResults->fetchAll(PDO::FETCH_BOTH);
              foreach($results as $row){

                $sonuc = $row['Name'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['RemoteTime'].'&nbsp;&nbsp;&nbsp;&nbsp;'.number_format(($row['Consumption']), 2, ',', '.').'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukButceSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['GunlukGerceklesmeSkb'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                echo "<br>";
                print $sonuc;
              }
              }
                }
            }
?>
    <table border="1">
        <tr>
          <form method="post">
          <th>Tüketim Noktası</th><th>İlk Tarih</th><th>Son Tarih</th><th>SKB</th>
        </tr>
          <tr></tr>
          <tr>
          <th>
          <select class="other1" name="nokta_name">
          <option value="seçim yapılmadı" selected>&nbsp;&nbsp;&nbsp;Tüketim Noktası Seçiniz&nbsp;&nbsp;&nbsp;</option>
          <?php
          $msql = "select Name from Points";
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
          <th><input type="double" class="value" id="skb" name="skb" align="right"></th>



          <br><br>
          </tr>
    </table>
    <br>
    <input type="submit" name="kaydet" id="kaydet" value="Kaydet" onclick="return confirm('Kayıt işlemine devam edilsin mi?')">
    </form>

    <style type="text/css">

    #skb{
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
