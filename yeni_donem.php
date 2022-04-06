<?php 
 
include("ayar.php");
ob_start();
session_start();

$yil=date('Y');
$ay=date('m');
//$month=date('F');
//$month='January)'
//If ($month='January') {
//    $month='Ocak';
//}
//If ($month='August') {
//    $month='Ağustos';
//}
$date1=$yil.$ay;

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {

Echo "<head>";	
Echo "<h1>Palmet Ön Ödemeli Tüketim Uygulaması</h1>";
Echo    "<h2>Dönemsel İşlemler</h2>";
Echo    "<div id='menu'>";
Echo    "<a href='admin.php'>Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;";
Echo    "<a href='donemsel.php'>Dönemsel İşlemler Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;";    
Echo    "<br><br>";
Echo    "</div>";
Echo    "<form name='kayit' method='POST' action='yeni_donem.php'>";
Echo    "<table>";
Echo    "<tr>";
Echo    "<td>Dönem Kodu</td>";
Echo    "<td><input type='integer' name='donem_kodu' maxlength='6' value='".$date1."' size='10'></td>";
Echo    "</tr>";
?>
<html>
  <tr>
    <td>Dönem Adı</td>
    <td><input type="text" name="donem_adi" maxlength="14" size="16"></td>
  </tr>
  <tr>
    <td>Birim Bedel Kademe1 (TL/kwh)</td>
    <td><input type="double" name="k1_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>Birim Bedel Kademe2 (TL/kwh)</td>
    <td><input type="double" name="k2_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>Birim Bedel Kademe3A (TL/kwh)</td>
    <td><input type="double" name="k3A_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
    <tr>
    <td>Birim Bedel Kademe3B (TL/kwh)</td>
    <td><input type="double" name="k3B_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>Birim Bedel Kademe4 (TL/kwh)</td>
    <td><input type="double" name="k4_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>Birim Bedel Kademe5 (TL/kwh)</td>
    <td><input type="double" name="k5_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>Birim Bedel Kademe6 (TL/kwh)</td>
    <td><input type="double" name="k6_kwh" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
<tr>
    <td>Ortalama Fiili Üst Isıl Değer (OFID)</td>
    <td><input type="float" name="ofid" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>21 mbar K Katsayısı</td>
    <td><input type="float" name="k_21" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>300 mbar K Katsayısı</td>
    <td><input type="float" name="k_300" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
  <tr>
    <td>1000 mbar K Katsayısı</td>
    <td><input type="float" name="k_1000" maxlength="12" size="10">  !!! Lütfen değeri nokta kullanarak giriniz, kesinlikle virgül kullanmayınız.</td>
  </tr>
    </table>
    <br><br>
    <form method="post"><input type="submit" name="premac" id="premac" value="Kaydet"></form>
    <textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea><br><br>
    <style type="text/css">

    #textarea1{
   resize:none;
    }

</style>
    
    </head>
</html>
<?php
    $donem_kodu = $_POST['donem_kodu'];
    $donem_adi = $_POST['donem_adi'];
    $k1_kwh = $_POST['k1_kwh'];
    $k2_kwh = $_POST['k2_kwh'];
    $k3A_kwh = $_POST['k3A_kwh'];
    $k3B_kwh = $_POST['k3B_kwh'];
    $k4_kwh = $_POST['k4_kwh'];
    $k5_kwh = $_POST['k5_kwh'];
    $k6_kwh = $_POST['k6_kwh'];
    $ofid = $_POST['ofid'];
    $k_21 = $_POST['k_21'];
    $k_300 = $_POST['k_300'];
    $k_1000 = $_POST['k_1000'];

            if(isset($_POST["premac"])){
            $sql = "insert into kit_donemsel (donem_kodu, donem_adi, birim_bedel_kwh_k1, birim_bedel_kwh_k2, birim_bedel_kwh_k3A, birim_bedel_kwh_k3B , birim_bedel_kwh_k4, birim_bedel_kwh_k5, birim_bedel_kwh_k6, ofid, k_21, k_300, k_1000) values ('".$donem_kodu."','".$donem_adi."','".$k1_kwh."','".$k2_kwh."','".$k3A_kwh."','".$k3B_kwh."','".$k4_kwh."','".$k5_kwh."','".$k6_kwh."','".$ofid."','".$k_21."','".$k_300."','".$k_1000."')";
            if (mysqli_query($conn, $sql)) {
                  echo "Yeni kayıt işlemi başarıyla tamamlandı!";
            } else {
                  echo "HATA: Kayıt işlemi GERÇEKLEŞTİRİLEMEDİ! ";
            }
            mysqli_close($conn);
            }
}
?>