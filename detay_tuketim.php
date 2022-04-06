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
    <h2>Detay Tüketim Görüntüleme Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="raporlar.php">Raporlar Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

    $aranan = $_POST["aranan"];
    };
            $sql = "select kit.oo_musteri, kit.oom_soz_no, kontrol_tarihi, mekanik_endeks, kit_endeks, kalan, tuketim from kit_tuketim inner join kit on kit_tuketim.oom_id=kit.oom_id where oom_soz_no='$aranan'";
            $res=mysqli_query($conn,$sql);
            $numrows = mysqli_num_rows($res);
            echo "<br>";
            echo "<b>Toplam Kayıt Sayısı : ".$numrows."</b>";
            echo "<br><br><table  border=1>";
            echo "<tr>";
            echo "<th>Sözleşme No</th><th>Müşteri</th><th>Kontrol Tarihi</th><th>Mekanik Endeks</th><th>Kit Endeks</th><th>Kalan</th><th>Tüketim</th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td width='100' align='center'>";
        echo $row["oom_soz_no"];
        echo "</td>";
        echo "<td width='460'>";
        echo $row["oo_musteri"];
        echo "</td>";
        echo "<td width='120' align='center'>";
        $date = $row["kontrol_tarihi"];
        $new_date = date('d/m/Y', strtotime($date));
        echo $new_date;
        echo "</td>";
        echo "<td width='130' align='right'>";
        $me = $row["mekanik_endeks"];
        $mekanik_endeks = number_format($me, 2, ',', '.');
        echo $mekanik_endeks;
        echo "</td>";
        echo "<td width='130' align='right'>";
        $ke = $row["kit_endeks"];
        $kit_endeks = number_format($ke, 2, ',', '.');
        echo $kit_endeks;
        echo "</td>";
        echo "<td width='130' align='right'>";
        $k = $row["kalan"];
        $kalan = number_format($k, 2, ',', '.');
        echo $kalan;
        echo "</td>";
        echo "<td width='130' align='right'>";
        $t = $row["tuketim"];
        $tuketim = number_format($t, 2, ',', '.');
        echo $tuketim;
        echo "</td>";
        //echo "<td width='80' align='center'><a href='sil.php?id=".$row['oom_id']."' onclick='return uyari();'>Sil</a>";
        //echo "</td>";
        //echo "</td>";
        //echo "<td width='100' align='center'><a href='guncelle1.php?aranan=".$row['oom_soz_no']."'>Güncelle</a>";
        //echo "</td>";
        echo "</tr>";
            }
            mysqli_close($conn);

echo "</table>";
echo "<br><br>";



/*    echo "<form name='kayit' method='POST' action='guncelle1.php'>";
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
    echo "</form>"; */
    echo "<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>";
?>
