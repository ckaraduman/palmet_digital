<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
//Security Code 
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
    <h2>Dönem Kayıt Güncelleme Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="yeni_donem.php">Yeni Dönem Ekle</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="donemler.php">Dönemleri Listele</a>
    </div>
</html>

    <style type="text/css">

    #textarea1{
   resize:none;
    }
    #menu{
      font-size: 14px;
      font-weight: bold;
      word-spacing:0px;
    }
    </style>
 <br><br>


<?php

            if(isset($_POST["buton2"])){
            $_id=$_POST['donem_id'];
            $_donem_kodu=$_POST['donem_kodu'];
   	        $_donem_adi=$_POST['donem_adi'];
   	        $_birim_bedel_kwh_k1=$_POST['k1_kwh'];
   	        $_birim_bedel_kwh_k2=$_POST['k2_kwh'];
   	        $_birim_bedel_kwh_k3A=$_POST['k3A_kwh'];
   	        $_birim_bedel_kwh_k3B=$_POST['k3B_kwh'];
   	        $_birim_bedel_kwh_k4=$_POST['k4_kwh'];
   	        $_birim_bedel_kwh_k5=$_POST['k5_kwh'];
   	        $_birim_bedel_kwh_k6=$_POST['k6_kwh'];
   	        $_ofid=$_POST['ofid'];
   	        $_k_21=$_POST['21_k'];
   	        $_k_300=$_POST['300_k'];
   	        $_k_1000=$_POST['1000_k'];
   	        /*$_mek_sayac_tipi=$_POST['msayac_model'];
   	        $_mek_say_no=$_POST['sayac_sn'];
   	        $_kit_tipi=$_POST['kit_model'];
   	        $_kit_sn=$_POST['kit_sn'];
   	        $_basinc=$_POST['basinc'];
   	        $_tarife=$_POST['tarife'];
   	        $_adres=$_POST['adres'];
   	        $_tel_no=$_POST['tel_no'];
   	        $_yetkili=$_POST['yetkili_ad_soyad'];
   	        $_yetkili_tel=$_POST['yetkili_tel_no'];
   	        */
   	        //$sql = "update kit_donemsel set oom_soz_no='".$_sozlesme_no."', oo_musteri='".$_musteri."', mek_sayac_tipi='".$_mek_sayac_tipi."', mek_say_no='".$_mek_say_no."', oo_kit_tipi='".$_kit_tipi."', oo_kit_seri_no='".$_kit_sn."', oo_basinc='".$_basinc."', oom_tarife='".$_tarife."', oom_adres='".$_adres."', oom_tel_no='".$_tel_no."', oom_yetkili='".$_yetkili."', oom_yetkili_tel_no='".$_yetkili_tel."'  where oom_id='".$_id."'";
   	        $sql = "update kit_donemsel set donem_kodu='".$_donem_kodu."', donem_adi='".$_donem_adi."', birim_bedel_kwh_k1='".$_birim_bedel_kwh_k1."', birim_bedel_kwh_k2='".$_birim_bedel_kwh_k2."', birim_bedel_kwh_k3A='".$_birim_bedel_kwh_k3A."', birim_bedel_kwh_k3B='".$_birim_bedel_kwh_k3B."', birim_bedel_kwh_k4='".$_birim_bedel_kwh_k4."', birim_bedel_kwh_k5='".$_birim_bedel_kwh_k5."', birim_bedel_kwh_k6='".$_birim_bedel_kwh_k6."', ofid='".$_ofid."', k_21='".$_k_21."', k_300='".$_k_300."', k_1000='".$_k_1000."' where donem_id='".$_id."'";
            $res=mysqli_query($conn,$sql);
            echo 'Kayıt güncellendi!';

            while ($row=mysqli_fetch_array($res)) {
                }
            }
    $aranan = $_GET["aranan"];
    if ($aranan=="") {
    $aranan = $_POST["aranan"];
    };
    $sql = "select * from kit_donemsel where donem_kodu='$aranan'";
    $res=mysqli_query($conn,$sql);

    while ($bul = mysqli_fetch_array($res)) {

    $bulunan = $bul['oo_musteri'];
        extract($bul);
    }
        mysqli_close($conn);
            }
    echo "<form name='kayit' method='POST' action='donem_guncelle.php'>";
    echo "<table>";
     echo "<tr>";
    echo "<td>Dönem Kayıt No</td>";
    echo "<td><input type='integer' name='donem_id' value='".$donem_id."' size='11' align='right' readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Dönem Kodu</td>";
    echo "<td><input type='integer' name='donem_kodu' value='".$donem_kodu."' size='18' align='right'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Dönem Adı</td>";
    echo "<td><input type='text' name='donem_adi' value='".$donem_adi."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Birim Bedel Kademe1 (TL/kwh)</td>";
    echo "<td><input type='double' name='k1_kwh' value='".$birim_bedel_kwh_k1."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Birim Bedel Kademe2 (TL/kwh)</td>";
    echo "<td><input type='double' name='k2_kwh' value='".$birim_bedel_kwh_k2."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Birim Bedel Kademe3A (TL/kwh)</td>";
    echo "<td><input type='double' name='k3A_kwh' value='".$birim_bedel_kwh_k3A."' size='18'></td>";
    echo "</tr>";
    echo "<td>Birim Bedel Kademe3B (TL/kwh)</td>";
    echo "<td><input type='double' name='k3B_kwh' value='".$birim_bedel_kwh_k3B."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Birim Bedel Kademe4 (TL/kwh)</td>";
    echo "<td><input type='double' name='k4_kwh' value='".$birim_bedel_kwh_k4."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Birim Bedel Kademe5 (TL/kwh)</td>";
    echo "<td><input type='double' name='k5_kwh' value='".$birim_bedel_kwh_k5."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Birim Bedel Kademe6 (TL/kwh)</td>";
    echo "<td><input type='double' name='k6_kwh' value='".$birim_bedel_kwh_k6."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Ortalama Fiili Üst Isıl Değer (OFID)</td>";
    echo "<td><input type='float' name='ofid' value='".$ofid."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>21 mbar K Katsayısı</td>";
    echo "<td><input type='float' name='21_k' value='".$k_21."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>300 mbar K Katsayısı</td>";
    echo "<td><input type='float' name='300_k' value='".$k_300."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>1000 mbar K Katsayısı</td>";
    echo "<td><input type='float' name='1000_k' value='".$k_1000."' size='18'></td>";
    echo "</tr>";




    echo "<tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='buton2' id='buton2' value='Güncelle'>";
    echo "</form>";
    echo "<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>";
?>
