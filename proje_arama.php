<html>
	<head>
		<h1>Palmet PCMS V1 Veri Güncelleme Uygulaması</h1>
    <h2>Proje Durum Görüntüleme Ekranı</h2>

    <div id="menu">
		<a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="pcms_index.php">Palmet PCMS V1 Veri Güncelleme Ana Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;

    <br><br>
    </div>
</style>
</html>
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
<?php

include("ayar.php");
include("ayar2.php");
ob_start();
//session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
    $proje_no = $_POST["proje_no"];
		$bolge=$_SESSION["region"];

		if (empty($proje_no))
		{
			echo '<br>';
			echo "Proje No değeri girilmelidir!";
			header('Refresh: 5; url=/proje_durum.php');
		} else {

			If ($bolge=='palgaz') {
					$bolge_eki='LS_001_01';
			}
			If ($bolge=='palen') {
					$bolge_eki='LS_002_01';
			}
			If ($bolge=='izgaz') {
					$bolge_eki='LS_003_01';
			}

			echo '<br>';
			echo $proje_no;
			echo '<br>';
			echo $bolge;
			echo '<br>';
			echo $bolge_eki;
			echo '<br>';
				$tablo = "[energy].[dbo].[".$bolge_eki."_PROJECTLINE]";
			echo $tablo;



		// $msql = "select * from where Name='".$nokta_name."'";
		// $getResults = $connect->prepare($msql);
		// $getResults->execute();
		// $results = $getResults->fetchAll(PDO::FETCH_BOTH);
		// foreach($results as $row){
		// $nokta_kodu = $row['NoktaKodu'];
		// }
		// $tarih2=date('Y-m-d', strtotime($tarih2. ' + 1 days'));

		$tsql = "SELECT [LREF],[PROJECTID],[BNA_ID],[FLATID],[AGRID],[STATID]  FROM ".$tablo." where PROJECTID'".$proje_no."'";
		//$tsql = "select * from Botas_EBT_Integration where RemoteTime='".$tarih1." 08:00:00.000'";
		$getResults = $connect->prepare($tsql);
		$getResults->execute();
		$results = $getResults->fetchAll(PDO::FETCH_BOTH);
		foreach($results as $row){

			$sonuc = $row['LREF'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['BNA_ID'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['AGRID'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['STATID'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['PROJECTID'].'&nbsp;&nbsp;&nbsp;&nbsp;';
			echo "<br>";
			print $sonuc;
		}
		}



    // $sql = "select * from kit where oo_musteri LIKE '%$aranan%'";
    // $res=mysqli_query($conn,$sql);
		//
    // while ($bul = mysqli_fetch_array($res)) {
		//
    // $bulunan = $bul['oo_musteri'];
    //     extract($bul);
    //     echo "<table border='1'><tr><td width='50px' align='center'>$oom_soz_no</td><td width='250px'>$oo_musteri</td></tr></table>";
    // }
    //     mysqli_close($conn);
            }
?>
