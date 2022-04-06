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
    <h2>Yeni Ön Ödemeli Müşteri Kayıt Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="on_odemeli_menu.php">Ön Ödemeli Müşteriler Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
    </div>
    <!--
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript">
    var kceli	= new Array("Gebze", "Darıca", "Çayırova", "Dilovası");
    var erzrm	= new Array("Aşkale", "Hınıs", "Horasan", "Ilıca", "İspir", "Narman", "Oltu", "Olur", "Pasinler", "Tortum");
    function set_player() {
     var select_il = document.arama.il;
     var select_ilce = document.arama.ilce;
     var selected_il = select_il.options[select_il.selectedIndex].value;

    select_ilce.options.length=0;
    if (selected_il == "Kocaeli"){
    for(var i=0; i<kceli.length; i++)
    select_ilce.options[select_ilce.options.length] = new Option(kceli[i]);
  }
  if (selected_il == "Erzurum"){
    for(var i=0; i<erzrm.length; i++)
    select_ilce.options[select_ilce.options.length] = new Option(erzrm[i]);
  }
    }  
    </script>
    <form name="arama" method="POST" action="gelen.php">
    -->
    <form name="kayit" method="POST" action="yeni_kayit.php">
    <table>
  <tr>
    <td>Sözleşme Numarası</td>
    <td><input type="text" name="sozlesme_no" maxlength="14" size="18"></td>
  </tr>
  <tr>
    <td>Müşteri</td>
    <td><input type="text" name="musteri" maxlength="80" size="100"></td>
  </tr>
  <tr>
    <td>Mekanik Sayaç Modeli</td>
    <td><select name="msayac_model">
        <option selected="selected"></option>
        <option value="G4">G4</option>
        <option value="G6">G6</option>
        <option value="G10">G10</option>
        <option value="G16">G16</option>
        <option value="G25">G25</option>
        <option value="G40">G40</option>
        <option value="G65">G65</option>
        <option value="G100">G100</option>
        <option value="G160">G160</option>
        <option value="G250">G250</option>
        <option value="G400">G400</option>
        <option value="G650">G650</option>
        <option value="G1000">G1000</option>
    </select></td>
  </tr>
  <tr>
    <td>Mekanik Sayaç Seri Numarası</td>
    <td><input type="text" name="sayac_sn" maxlength="14" size="20"></td>
  </tr>
  <tr>
    <td>Ön Ödemeli Kit Modeli</td>
    <td><select name="kit_model">
        <option selected="selected"></option>
        <option value='U4'>U4</option>
        <option value='U6'>U6</option>
        <option value='U10'>U10</option>
        <option value='U16'>U16</option>
        <option value='U25'>U25</option>
        <option value='U40'>U40</option>
        <option value='U65'>U65</option>
        <option value='U100'>U100</option>
        <option value='U160'>U160</option>
        <option value='U250'>U250</option>
        <option value='U400'>U400</option>
        <option value='U650'>U650</option>
        <option value='U1000'>U1000</option>
    </select></td>
  </tr>
  <tr>
    <td>Ön Ödemeli Kit Seri Numarası</td>
    <td><input type="text" name="kit_sn" maxlength="14" size="20"></td>
  </tr>
  <tr>
    <td>Tesisat Kullanım Basıncı</td>
    <td><select name="basinc">
        <option selected="selected"></option>
        <option value="21">21</option>
        <option value="300">300</option>
        <option value="1000">1000</option>
    </select></td>
  </tr>
  <tr>
    <td>Tarife Tipi</td>
    <td><select name="tarife">
        <option selected="selected"></option>
        <option value="Kademe1">Kademe1</option>
        <option value="Kademe2">Kademe2</option>
        <option value="Kademe3A">Kademe3A</option>
        <option value="Kademe3B">Kademe3B</option>
    </select></td>
  </tr>
  <!--
  <tr>
    <td>Müşteri İli</td>
    <td><select name="il" onchange="set_player()">
        <option selected="selected">Lütfen Seçiniz</option>
        <option value="Erzurum">Erzurum</option>
        <option value="Kocaeli">Kocaeli</option>
    </select></td>
  </tr>
  <tr>
    <td>Müşteri İlçesi</td>
    <td><select name="ilce"> <option>Önce İl Seçiniz</option>
    </select></td>
  </tr>
  -->
  <tr>
    <td>Adres</td>
    <td><input type="text" name="adres" maxlength="80" size="100"></td>
  </tr>
  <tr>
    <td>Telefon Numarası</td>
    <td><input type="text" name="tel_no" maxlength="12" size="14"></td>
  </tr>
  <tr>
    <td>Yetkili Adı Soyadı</td>
    <td><input type="text" name="yetkili_ad_soyad" maxlength="34" size="42"></td>
  </tr>
  <tr>
    <td>Yetkili Telefon Numarası</td>
    <td><input type="text" name="yetkili_tel_no" maxlength="12" size="14"></td>
  </tr>
    </table>
    <br><br><br>
    <button style="position:relative;top:0px;height:22px;width:150px" onclick="window.location.href='https://www.makroport.com/palmet/logout.php'">Güvenli Çıkış</button>
    <form method="post"><input type="submit" name="premac" id="premac" value="Kaydet"></form>
    <textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
    <br><br><center>Admin sayfasina hosgeldiniz..! 
    <br><a href=logout.php>Guvenli cikis</a></center>
    
    <style type="text/css">

    #textarea1{
   resize:none;
    }

</style>
    
    </head>
</html>
<?php
    $sozlesme_no = $_POST['sozlesme_no'];
    $musteri = $_POST['musteri'];
    $msayac_model = $_POST['msayac_model'];
    $sayac_sn = $_POST['sayac_sn'];
    $kit_model = $_POST['kit_model'];
    $kit_sn = $_POST['kit_sn'];
    $basinc = $_POST['basinc'];
    $tarife = $_POST['tarife'];
    $adres = $_POST['adres'];
    $tel_no = $_POST['tel_no'];
    $yetkili_ad_soyad = $_POST['yetkili_ad_soyad'];
    $yetkili_tel_no = $_POST['yetkili_tel_no'];
    /* $mysql_qry = "select * from login where username like '$user_name' and password like '$user_pass';";
    $result = mysqli_query($conn,$mysql_qry);
    if(mysqli_num_rows($result) > 0) {
    echo "<br> Giriş başarılı! <br>";
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:admin.php");
}
else {
echo "<br> Giriş yapılamadı! <br>";
}
    BUTONLA KOD ÇALIŞTIRMAK İÇİN : <form method="post"><input type="submit" name="premac" id="premac" value="Aktif et" style="position: absolute; left: 76px; top: 151px; width: 61px; height: 23px;z-index: 8;"></form>
                
                <?php 
                   
                if(isset($_POST["premac"])){
                    
                //kodlar buraya
                    
                }
                   
                 ?>     


*/
            if(isset($_POST["premac"])){
            $sql = "insert into kit (oom_soz_no, oo_musteri, mek_sayac_tipi, mek_say_no, oo_kit_tipi, oo_kit_seri_no, oo_basinc, oom_tarife, oom_adres, oom_tel_no, oom_yetkili, oom_yetkili_tel_no) values ('".$sozlesme_no."','".$musteri."','".$msayac_model."','".$sayac_sn."', '".$kit_model."', '".$kit_sn."', '".$basinc."', '".$tarife."', '".$adres."', '".$tel_no."', '".$yetkili_ad_soyad."', '".$yetkili_tel_no."')";
            //$sql = "insert into kit (oom_soz_no) values ('".$sozlesme_no."')";
            if (mysqli_query($conn, $sql)) {
                  echo "New record created successfully";
            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            }
}
?>