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
    <h1>Palmet Dijital</h1>
    <h2>Yeni Kurum Kayıt Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="evrak_index.php">Belge Yönetim Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
    </div>
    <form name="kayit" method="POST" action="yeni_kurum_kayit.php">
    <table>
  <tr>
    <td>Kurum</td>
    <td><input type="text" name="kurum" maxlength="50" size="70"></td>
  </tr>
  <tr>
    <td>Departman/Bölüm/Daire/Müdürlük</td>
    <td><input type="text" name="bolum" maxlength="50" size="70"></td>
  </tr>
  <tr>
    <td>Adres</td>
    <td><input type="text" name="adres" maxlength="60" size="80"></td>
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
    $kurum = $_POST['kurum'];
    $bolum = $_POST['bolum'];
    $adres = $_POST['adres'];
    $tel_no = $_POST['tel_no'];
    $yetkili_ad_soyad = $_POST['yetkili_ad_soyad'];
    $yetkili_tel_no = $_POST['yetkili_tel_no'];

            if(isset($_POST["premac"])){
            $sql = "insert into kurum (kurum, bolum, kurum_adres, kurum_tel_no, kurum_yetkili, kurum_yetkili_tel_no) values ('".$kurum."','".$bolum."','".$adres."', '".$tel_no."', '".$yetkili_ad_soyad."', '".$yetkili_tel_no."')";
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