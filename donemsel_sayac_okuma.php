<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
//Security Code 
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
Echo "<h1>Palmet Dijital</h1>";
Echo    "<h2>Dönemsel Hakkediş İşlemleri</h2>";
Echo    "<div id='menu'>";
Echo    "<a href='admin.php'>Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;";
Echo    "<a href='hakedis_index.php'>Hakkediş Yönetim Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;";
Echo    "<br><br>";
Echo    "</div>";
Echo    "<form name='kayit' method='POST' action='hakedis_donem.php'>";
Echo    "<table>";
?>
<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <script>
    $(document).ready(function(){
    $('.format').mask('000.000.000.000.000', {reverse: true});
    });

    </script>


    </head>
    <body>
    <tr>
    <td>Dönem Adı</td>
    <td><select class="other1" name="donem">
    <option value="seçim yapılmadı" selected>Dönem Seçiniz</option>
    <?php
    $sql = "select * from kit_donemsel";
    $res=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($res))
    {
    $liste1 = $row['donem_adi'];
    print "<option value=\"$liste1\">$liste1</option>";
    };
    ?>
    </select></td>
  </tr>
    <tr>
    <td>Taşeron Adı</td>
    <td><select class="other1" name="taseron">
    <option value="seçim yapılmadı" selected>Taşeron Seçiniz</option>
    <?php
    $sql = "select * from taseron";
    $res=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($res))
    {
    $liste1 = $row['taseron'];
    print "<option value=\"$liste1\">$liste1</option>";
    };
    ?>
    </select></td>
    </tr>
    <tr>
        <td>Sayaç Okuma Sayısı</td>
        <td><input type="integer" name="sayac_okuma_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Borçtan Kapatılan Sayaç Sayısı</td>
        <td><input type="integer" name="kesilen_sayac_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Borcun Tahsilatı Sonrası Açılan Sayaç Sayısı</td>
        <td><input type="integer" name="acilan_sayac_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Sözleşme Fesih Sonrası Kapatılan Sayaç Sayısı</td>
        <td><input type="integer" name="kapatilan_sayac_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Dağıtılan İhbar Sayısı</td>
        <td><input type="integer" name="ihbar_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Usulsüz Kullanım Tespiti Sonrası Kapatılan Sayaç Sayısı</td>
        <td><input type="integer" name="usulsuz_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Usulsüz Kullanım Tespiti Sonrası Sökülen Sayaç Sayısı</td>
        <td><input type="integer" name="sokulen_sayac_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    <tr>
        <td>Değiştirilen Sayaç Sayısı</td>
        <td><input type="integer" name="degistirilen_sayac_sayisi" id="sos" class="format" maxlength="14" size="12"></td>
    </tr>
    </table>
    <br><br>
    <form method="post"><input type="submit" name="premac" id="premac" value="Kaydet"></form>
    <textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2021</textarea><br><br>

    </body>


    <style type="text/css">
        #sos{
        text-align:right;
        }

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
