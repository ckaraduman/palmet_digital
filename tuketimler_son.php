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
    <h2>Ön Ödemeli Müşteriler Dönemsel Değerler Giriş Ekranı</h2>
    
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
    </div>
    <br><br>
    <table><tr><th>İlgili Dönem :</th><th>
    <form name="tuketim" method="POST" action="tuketimler.php">
    <select class="other1" name="donem">
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
    </select>
    </th><tr></tr><tr><th>Kontrol Tarihi :</th><th>
    <input type="date" name="kontrol_tarihi">
    </tr></th>
    </tr></table>
    <br><br>
    <table>
    <tr>
    <th>Müşteri</th><th>Mekanik Endeks</th><th>Kit Endeks</th><th>Kalan</th>
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
    <td><input type="double" class="f2" id="text1" name="mekanik" align="right"></td>
    <td><input type="double" class="f2" id="text1" name="kit" maxlength="14" size="18"></td>
    <td><input type="double" class="f2" id="text1" name="kalan" maxlength="14" size="18"></td>
    <td><form method="post"><input type="submit" name="premac2" id="premac2" value="Hesapla"></form></td>
    </table>
    <br><br>


<?php
            if(isset($_POST["kaydet"])){

            $sql = "select * from kit_tuketim_temp ";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $oom_id = $row['oom_id'];
            $aktif_donem_kodu = $row['aktif_donem_id'];
            $gelecek_donem_kodu = $row['gelecek_donem_id'];
            $kontrol_tarihi = $row['kontrol_tarihi'];
            $mekanik = $row['mekanik_endeks'];
            $kit = $row['kit_endeks'];
            $kalan_sm3 = $row['kalan'];
            $tuketim = $row['tuketim'];
            }
            
            $sql = "insert into kit_tuketim (oom_id, aktif_donem_id, gelecek_donem_id, kontrol_tarihi, mekanik_endeks, kit_endeks, kalan, tuketim) values ('".$oom_id."','".$aktif_donem_kodu."','".$gelecek_donem_kodu."','".$kontrol_tarihi."','".$mekanik."','".$kit."','".$kalan_sm3."','".$tuketim."')";
            if (mysqli_query($conn, $sql)) {
            
            } else {
                  echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
            }
            $sql = "delete from kit_tuketim_temp";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            }
            mysqli_close($conn);
            echo "<br><br>";
            echo "Kayıt İşlemi Başarıyla Tamamlandı!<br><br>";
            }
            
            
            $kontrol_tarihi = $_POST['kontrol_tarihi'];
            
            $donem = $_POST['donem'];
            $sql = "select donem_kodu from kit_donemsel where donem_adi='".$donem."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $donem2 = $row[0];
            $ilk3 =  mb_substr($yazi,  0,  3);
            
            $yil = mb_substr($donem2, 0, 4);
            $ay = mb_substr($donem2, 4,2);
            
            $donem1 = $yil.$ay;
            
            $yil = mb_substr($donem1, 0, 4);
            $ay = mb_substr($donem1, 4,2);
            $ay = $ay-1;
                if ($ay<1) {
                    $ay=12;
                    $yil=$yil-1;       
                }
                if ($ay<10) {
                    $ay = "0".$ay;
                }
            $donem_eski = $yil.$ay;
            
            $yil = mb_substr($donem2, 0, 4);
            $ay = mb_substr($donem2, 4,2);
            $ay = $ay+1;
                if ($ay>12) {
                    $ay=1;
                    $yil=$yil+1;       
                }
                if ($ay<10) {
                    $ay = "0".$ay;
                }
            $donem3 = $yil.$ay;    
            
            }
            /*
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
            
            */
                
            $mekanik = $_POST['mekanik'];
            $mekanik = str_replace(',','.',$mekanik);
            $kit = $_POST['kit'];
            $kit = str_replace(',','.',$kit);
            $kalan = $_POST['kalan'];
            $kalan = str_replace(',','.',$kalan);
            $musteri = $_POST['musteri'];
            $aktif_donem_kodu = $donem2;
            $gelecek_donem_kodu = $donem3;
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
            }
            
            $sql = "select ".$bas_ara." from kit_donemsel where donem_kodu='".$gelecek_donem_kodu."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $gelecek_katsayi = $row[0];
            }
            
            $sql = "select mekanik_endeks, kit_endeks from kit_tuketim where oom_id='".$musteri_id."' and aktif_donem_id='".$donem_eski."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $eski_mekanik_endeks = $row['mekanik_endeks'];
            $eski_kit_endeks = $row['kit_endeks'];
            }


            
            
            $sql = "select id from kit_tuketim where oom_id='".$musteri_id."' and aktif_donem_id='".$donem1."'";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
            $durum = $row[0]; 
            }
            if ($durum>0) {
                echo "Bu döneme ait kayıt daha önce girilmiş, tekrar girilemez!";
                goto durum1;
            }

           
            $mekanik_tuketim = $mekanik - $eski_mekanik_endeks;
            $kit_tuketim = $kit - $eski_kit_endeks;
            echo $mekanik_tuketim;
            echo "<br>";
            echo $kit_tuketim;
            echo "<br><br>";
            if ($mekanik_tuketim-5<$kit_tuketim && $kit_tuketim<$mekanik_tuketim+5) {
                echo "Puls ve tüketim karşılaştırma sistemi doğru çalışıyor!";    
                }
            else {
                echo "Puls ve tüketim karşılaştırma sistemi doğru ÇALIŞMIYOR! Verileri kontrol ederek tekrar giriş yapınız veya sistemi kontrol ediniz!";
                }
            $tuketim = $mekanik_tuketim * $aktif_katsayi;
            $kalan_sm3 = $kalan * $gelecek_katsayi;
            $sql = "insert into kit_tuketim_temp (oom_id, aktif_donem_id, gelecek_donem_id, kontrol_tarihi, mekanik_endeks, kit_endeks, kalan, tuketim) values ('".$musteri_id."','".$aktif_donem_kodu."','".$gelecek_donem_kodu."','".$kontrol_tarihi."','".$mekanik."','".$kit."','".$kalan_sm3."','".$tuketim."')";
            if (mysqli_query($conn, $sql)) {
                  echo "<br>";
                  echo "Önceki Mekanik Endeks = ".$eski_mekanik_endeks;
                  echo "<br>";
                  echo "Son Mekanik Endeks = ".$mekanik;
                  echo "<br>";
                  echo "Önceki Kit Endeks = ".$eski_kit_endeks;
                  echo "<br>";
                  echo "Son Kit Endeks = ".$kit;
                  echo "<br>";
                  echo "Durum = ".$durum;
                  echo "<br>";
                  echo "Kontrol Tarihi = ".$kontrol_tarihi;
                  echo "<br>";
                  echo "Önceki Dönem = ".$donem_eski;
                  echo "<br>";
                  echo "Aktif (Değerlenecek) Dönem = ".$donem2;
                  echo "<br>";
                  echo "Sonraki Dönem = ".$donem3;
                  echo "<br>";
                  echo "Kalan Miktar = ".$kalan_sm3;
                  echo "<br>";
                  echo "Müşteri Tesisat Basıncı = ".$basinc;
                  echo "<br>";
                  echo "Müşteri Aktif Dönem Basınç Katsayısı = ".$aktif_katsayi;
                  echo "<br>";
                  echo "Müşteri Gelecek Dönem Basınç Katsayısı = ".$gelecek_katsayi;
                  echo "<br>";
                  echo "Hesaplanan Müşteri Dönem Tüketimi = ".$tuketim;
            } else {
                  echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            echo "<br>";
            echo $musteri;
            echo "<br>";
            $mekanik = str_replace(',','.',$mekanik);
            echo $mekanik;
            echo "<br>";
            echo $kit;
            echo "<br>";
            echo $kalan;
            echo "<br><br>";
            echo "Hesaplama Tamamlandı!<br><br>";
            
            echo "<form method='post'><input type='submit' name='kaydet' id='kaydet' value='Kaydet'></form>";
            
            }
durum1:

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

</html>