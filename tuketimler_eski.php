<!doctype html>
<html>
<head>
<meta charset="utf-8">

</head>

</html>

<?php 
 
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
    <h2>Ön Ödemeli Müşteriler Dönemsel Tüketim Ekranı</h2>
    
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
    </div>
</html>
<?php
echo "<br><br>";
?>
    <form name="tuketim" method="POST" action="tuketimler.php">
    <table>
    <tr>
    <th>Müşteri</th><th>Kontrol Tarihi</th><th>Mekanik Endeks</th><th>Kit Endeks</th><th>Kalan</th>
    </tr>
    <tr>
    
    <td>
    <select class="other1" name="musteri">
    <option value="seçim yapılmadı" selected>Müşteri Seçiniz</option>
    <?php
    $sql = "select * from kit";
    $res=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($res))
    {
    $liste1 = $row['oo_musteri'];
    print "<option value=\"$liste1\">$liste1</option>";
    };
    ?>

    </select>
    </td>
    <td><input type="date" name="kontrol_tarihi"></td>
    <td><input type="double" class="f2" id="text1" name="mekanik" align="right"></td>
    <td><input type="double" class="f2" id="text1" name="kit" maxlength="14" size="18"></td>
    <td><input type="double" class="f2" id="text1" name="kalan" maxlength="14" size="18"></td>
    <td><form method="post"><input type="submit" name="premac2" id="premac2" value="Kaydet"></form></td>
    </table>
    <br><br>


<?php
            $kontrol_tarihi = $_POST['kontrol_tarihi'];
            $gun = date("d", strtotime($kontrol_tarihi));
            $ay = date("m", strtotime($kontrol_tarihi));
            $yil =date("Y", strtotime($kontrol_tarihi));
            if ($gun>15) {
            $donem1 = (string)$yil.(string)$ay;
                if ($ay>11) {
                
                $ay=0;
                $yil=$yil+1;
                }
            if ($ay<10) {
                    $ay = "0".$ay;
                $donem2 = (string)$yil.(string)$ay+1;
                }
            
            }
            else {
                $ay = $ay-1;
                if ($ay<1) {
                    $ay=12;
                    $yil=$yil-1;       
                }
                if ($ay<10) {
                    $ay = "0".$ay;
                }
                $donem1 = (string)$yil.(string)$ay;
                if ($ay>11) {
                
                $ay=0;
                $yil=$yil+1;
                }
                 if ($ay<10) {
                    $ay = "0".$ay;
                 }
                $donem2 = (string)$yil.(string)$ay+1;
            }
    
    
    
            $mekanik = $_POST['mekanik'];
            $mekanik = str_replace(',','.',$mekanik);
            $kit = $_POST['kit'];
            $kit = str_replace(',','.',$kit);
            $kalan = $_POST['kalan'];
            $kalan = str_replace(',','.',$kalan);
            $musteri = $_POST['musteri'];
            $aktif_donem_kodu = $donem1;
            $gelecek_donem_kodu = $donem2;
            }
            if(isset($_POST["premac2"])){
            $sql = "select oom_id from kit where oo_musteri='".$musteri."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $musteri_id = $row[0];
            $sql = "select oo_basinc from kit where oo_musteri='".$musteri."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $basinc = $row[0];
            $bas_ara = 'k_'.$basinc;
            }
            }
            
            $sql = "select ".$bas_ara." from kit_donemsel where donem_kodu='".$aktif_donem_kodu."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $aktif_katsayi = $row[0];
            
            $sql = "select ".$bas_ara." from kit_donemsel where donem_kodu='".$gelecek_donem_kodu."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $gelecek_katsayi = $row[0];
            
                
            }
            }
            $tuketim = $kalan * $aktif_katsayi;
            $kalan_sm3 = $kalan * $gelecek_katsayi;
            $sql = "insert into kit_tuketim (oom_id, aktif_donem_id, gelecek_donem_id, kontrol_tarihi, mekanik_endeks, kit_endeks, kalan, tuketim) values ('".$musteri_id."','".$aktif_donem_kodu."','".$gelecek_donem_kodu."','".$kontrol_tarihi."','".$mekanik."','".$kit."','".$kalan_sm3."','".$tuketim."')";
            if (mysqli_query($conn, $sql)) {
                  echo "<br>";
                  echo "Kontrol Tarihi = ".$kontrol_tarihi;
                  echo "<br>";
                  echo "Önceki Dönem = ".$donem1;
                  echo "<br>";
                  echo "Güncel Dönem = ".$donem2;
                  echo "<br>";
                  echo "Tüketim Miktarı = ".$tuketim;
                  echo "<br>";
                  echo "Kalan Miktar = ".$kalan_sm3;
                  echo "<br>";
                  echo "Yeni Kayıt Tamamlandı!";
                  echo "<br>";
                  echo "Müşteri Tesisat Basıncı = ".$basinc;
                  echo "<br>";
                  echo "Müşteri Aktif Dönem Basınç Katsayısı = ".$aktif_katsayi;
                  echo "<br>";
                  echo "Müşteri Gelecek Dönem Basınç Katsayısı = ".$gelecek_katsayi;
                  echo "<br>";
                  echo "Hesaplanan Müşteri Dönem Tüketimi = ".$tuketim;
                  echo "<br>";
            } else {
                  echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            echo $musteri;
            echo "<br>";
            $mekanik = str_replace(',','.',$mekanik);
            echo $mekanik;
            echo "<br>";
            echo $kit;
            echo "<br>";
            echo $kalan;
            echo "<br>";
            echo "Kayıt tamamlandı!";
            }

?>

    <style type="text/css">
    
    #premac2{
    width:100;
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
    #text1{
        text-align: right;  
    }
    
    </style>
 <br><br>
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
