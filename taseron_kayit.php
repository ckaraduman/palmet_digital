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
    <h2>Yeni Taşeron Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="hakedis_index.php">Hakkediş Yönetim Menüsü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
    </div>
    <form name="kayit" method="POST" action="taseron_kayit.php">
    <table>
  <tr>
    <td>Taşeron Firma/Kişi</td>
    <td><input type="text" name="taseron" maxlength="50" size="70"></td>
  </tr>
  <tr>
    <td>Vergi Dairesi</td>
    <td><input type="text" name="taseron_vergi_dairesi" maxlength="30" size="45"></td>
  </tr>
    <tr>
    <td>Vergi Numarası</td>
    <td><input type="text" name="taseron_vergi_no" maxlength="20" size="30"></td>
  </tr>
  <tr>
    <td>Adres</td>
    <td><input type="text" name="taseron_adres" maxlength="60" size="80"></td>
  </tr>
  <tr>
    <td>Telefon Numarası</td>
    <td><input type="text" name="taseron_tel_no" maxlength="12" size="14"></td>
  </tr>
  <tr>
    <td>Yetkili Adı Soyadı</td>
    <td><input type="text" name="taseron_yetkili" maxlength="34" size="42"></td>
  </tr>
  <tr>
    <td>Yetkili Telefon Numarası</td>
    <td><input type="text" name="taseron_yetkili_tel_no" maxlength="12" size="14"></td>
  </tr>
    </table>
    <br><br><br>
    <button style="position:relative;top:0px;height:22px;width:150px" onclick="window.location.href='https://www.makroport.com/palmet/logout.php'">Güvenli Çıkış</button>
    <form method="post"><input type="submit" name="premac" id="premac" value="Kaydet"></form>
    <textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2021</textarea>
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
    $taseron = $_POST['taseron'];
    $taseron_vergi_dairesi = $_POST['taseron_vergi_dairesi'];
    $taseron_vergi_no = $_POST['taseron_vergi_no'];
    $taseron_adres = $_POST['taseron_adres'];
    $taseron_tel_no = $_POST['taseron_tel_no'];
    $taseron_yetkili = $_POST['taseron_yetkili'];
    $taseron_yetkili_tel_no = $_POST['taseron_yetkili_tel_no'];

            if(isset($_POST["premac"])){
            $sql = "insert into taseron (taseron, taseron_vergi_dairesi, taseron_vergi_no, taseron_adres, taseron_tel_no, taseron_yetkili, taseron_yetkili_tel_no) values ('".$taseron."','".$taseron_vergi_dairesi."','".$taseron_vergi_no."','".$taseron_adres."', '".$taseron_tel_no."', '".$taseron_yetkili."', '".$taseron_yetkili_tel_no."')";
            //$sql = "insert into kit (oom_soz_no) values ('".$sozlesme_no."')";
            if (mysqli_query($conn, $sql)) {
                  echo "Yeni kayıt başarıyla eklendi!";
            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            }
}
?>