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
    <h2>Ön Ödemeli Müşteriler Kayıt Güncelleme Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="yeni_kayit.php">Kayıt Ekle</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="on_odemeli.php">Kayıt Listele</a>
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
            $_id=$_POST['oom_id'];
            $_sozlesme_no=$_POST['sozlesme_no'];
   	        $_musteri=$_POST['musteri'];
   	        $_mek_sayac_tipi=$_POST['msayac_model'];
   	        $_mek_say_no=$_POST['sayac_sn'];
   	        $_kit_tipi=$_POST['kit_model'];
   	        $_kit_sn=$_POST['kit_sn'];
   	        $_basinc=$_POST['basinc'];
   	        $_tarife=$_POST['tarife'];
   	        $_adres=$_POST['adres'];
   	        $_tel_no=$_POST['tel_no'];
   	        $_yetkili=$_POST['yetkili_ad_soyad'];
   	        $_yetkili_tel=$_POST['yetkili_tel_no'];
   	        
   	        $sql = "update kit set oom_soz_no='".$_sozlesme_no."', oo_musteri='".$_musteri."', mek_sayac_tipi='".$_mek_sayac_tipi."', mek_say_no='".$_mek_say_no."', oo_kit_tipi='".$_kit_tipi."', oo_kit_seri_no='".$_kit_sn."', oo_basinc='".$_basinc."', oom_tarife='".$_tarife."', oom_adres='".$_adres."', oom_tel_no='".$_tel_no."', oom_yetkili='".$_yetkili."', oom_yetkili_tel_no='".$_yetkili_tel."'  where oom_id='".$_id."'";
            $res=mysqli_query($conn,$sql);
            echo 'Kayıt güncellendi!';
            
            while ($row=mysqli_fetch_array($res)) {
                }
            }
    $aranan = $_GET["aranan"];
    if ($aranan=="") {
    $aranan = $_POST["aranan"];    
    };
    $sql = "select * from kit where oom_soz_no='$aranan'";
    $res=mysqli_query($conn,$sql);
   
    while ($bul = mysqli_fetch_array($res)) {
    
    $bulunan = $bul['oo_musteri'];
        extract($bul);
    }
        mysqli_close($conn);
            }
    echo "<form name='kayit' method='POST' action='guncelle1.php'>";
    echo "<table>";
    echo "<tr>";
    echo "<td>Kayıt Numarası</td>";
    echo "<td><input type='integer' name='oom_id' value='".$oom_id."'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Sözleşme Numarası</td>";
    echo "<td><input type='text' name='sozlesme_no' value='".$oom_soz_no."' size='18'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Müşteri</td>";
    echo "<td><input type='text' name='musteri' value='".$oo_musteri."' size='100'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Mekanik Sayaç Modeli</td>";
    echo "<td><select name='msayac_model'>";
    echo "<option selected='selected'>".$mek_sayac_tipi."</option>";
    echo "<option value='G4'>G4</option>";
    echo "<option value='G6'>G6</option>";
    echo "<option value='G10'>G10</option>";
    echo "<option value='G16'>G16</option>";
    echo "<option value='G25'>G25</option>";
    echo "<option value='G40'>G40</option>";
    echo "<option value='G65'>G65</option>";
    echo "<option value='G100'>G100</option>";
    echo "<option value='G160'>G160</option>";
    echo "<option value='G250'>G250</option>";
    echo "<option value='G400'>G400</option>";
    echo "<option value='G650'>G650</option>";
    echo "<option value='G1000'>G1000</option>";
    echo "</select>";
    echo "</select></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Mekanik Sayaç Seri Numarası</td>";
    echo "<td><input type='text' name='sayac_sn'  value='".$mek_say_no."' size='20'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Ön Ödemeli Kit Modeli</td>";
    echo "<td><select name='kit_model'>";
    echo "<option selected='selected'>".$oo_kit_tipi."</option>";
    echo "<option value='U4'>U4</option>";
    echo "<option value='U6'>U6</option>";
    echo "<option value='U10'>U10</option>";
    echo "<option value='U16'>U16</option>";
    echo "<option value='U25'>U25</option>";
    echo "<option value='U40'>U40</option>";
    echo "<option value='U65'>U65</option>";
    echo "<option value='U100'>U100</option>";
    echo "<option value='U160'>U160</option>";
    echo "<option value='U250'>U250</option>";
    echo "<option value='U400'>U400</option>";
    echo "<option value='U650'>U650</option>";
    echo "<option value='U1000'>U1000</option>";
    echo "</select>";
    echo "</select></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Ön Ödemeli Kit Seri Numarası</td>";
    echo "<td><input type='text' name='kit_sn'  value='".$oo_kit_seri_no."' size='20'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Tesisat Kullanım Basıncı</td>";
    echo "<td><select name='basinc'>";
    echo "<option selected='selected'>".$oo_basinc."</option>";
    echo "<option value='21'>21</option>";
    echo "<option value='300'>300</option>";
    echo "<option value='1000'>1000</option>";
    echo "</select>";
    echo "</select></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Tarife Tipi</td>";
    echo "<td><select name='tarife'>";
    echo "<option selected='selected'>".$oom_tarife."</option>";
    echo "<option value='Kademe1'>Kademe1</option>";
    echo "<option value='Kademe2'>Kademe2</option>";
    echo "<option value='Kademe3A'>Kademe3A</option>";
    echo "<option value='Kademe3B'>Kademe3B</option>";
    echo "</select>";
    echo "</select></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Adres</td>";
    echo "<td><input type='text' name='adres'  value='".$oom_adres."' size='100'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Telefon Numarası</td>";
    echo "<td><input type='text' name='tel_no'  value='".$oom_tel_no."' size='14'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Yetkili Adı</td>";
    echo "<td><input type='text' name='yetkili_ad_soyad'  value='".$oom_yetkili."' size='42'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Yetkili Telefon Numarası</td>";
    echo "<td><input type='text' name='yetkili_tel_no'  value='".$oom_yetkili_tel_no."' size='14'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='buton2' id='buton2' value='Güncelle'>";
    echo "</form>";
    echo "<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>";
?>


